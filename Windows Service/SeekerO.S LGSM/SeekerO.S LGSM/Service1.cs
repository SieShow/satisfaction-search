using System;
using System.Collections.Generic;
using System.ServiceProcess;
using MySql.Data.MySqlClient;
using System.IO;
using System.Timers;
namespace SeekerO.S_LGSM
{
    public partial class Service1 : ServiceBase
    {
        public Service1()
        {
            InitializeComponent();
        }
        private static StreamWriter log;
        /// <summary>
        /// Write in log file
        /// </summary>
        /// <param name="msg"></param>
        public static void LogWriteLine(string msg)
        {
            LogCheckCreation();
            log.WriteLine(DateTime.Now + "     " + msg);
        }
        /// <summary>
        /// Check if log file is already created
        /// </summary>
        private static void LogCheckCreation()
        {
            if(log == null)
            {
                log = new StreamWriter(AppDomain.CurrentDomain.BaseDirectory + @"\OperationLog.txt", true);
                log.AutoFlush = true;
            }
        }
        Timer StartMainFunction, StartWaitList;
        public static int lastOS = 0, codOS, codcli, osstate, cod_fun;
        public static string nomfun;
        /// <summary>
        /// Vector used to add O.S that isn't finished yet
        /// </summary>
        public static List<InformationOS> WaitList = new List<InformationOS>();

        protected override void OnStart(string[] args)
        {
            log = new StreamWriter(AppDomain.CurrentDomain.BaseDirectory + @"\OperationLog.txt", true);

            WaitList = WaitListOnStop.Load();

            Conection.DesktopServerProcedure();
            Conection.WebOpen();
            //When process starts 
            if (WaitList.Count >= 1)
            {
                CheckList();
            }

            this.StartMainFunction = new Timer(3000); // 3seg
            this.StartMainFunction.AutoReset = true;
            this.StartMainFunction.Elapsed += new ElapsedEventHandler(this.timer1_Elapsed);
            this.StartMainFunction.Start();

            this.StartWaitList = new Timer(1800000);// 30min
            this.StartWaitList.AutoReset = true;
            this.StartWaitList.Elapsed += new ElapsedEventHandler(this.timer2_Elapsed);
            this.StartWaitList.Start();

            LogWriteLine("Service starded");
            log.AutoFlush = true;
        }
        /// <summary>
        /// Main timer starts SatisfactionSenderSeeker()
        /// </summary>
        /// <param name="sender"></param>
        /// <param name="e"></param>
        private void timer1_Elapsed(object sender, ElapsedEventArgs e)
        {
            SatisfactionSenderSeeker();
        }
        /// <summary>
        /// subtimer execute Checklist()
        /// </summary>
        /// <param name="sender"></param>
        /// <param name="e"></param>
        private void timer2_Elapsed(object sender, ElapsedEventArgs e)
        {
            CheckList();
        }
        protected override void OnStop()
        {
            Conection.DeskConection.Close();
            Conection.WebConection.Close();
            LogCheckCreation();
            if (WaitList.Count >= 1)
            {
                LogWriteLine("There are unfinished O.S to be checked yet. Saving data...");
                string end = WaitListOnStop.Save(WaitList);
                if (end == "")
                {
                    LogWriteLine("data save successful. file path(" + AppDomain.CurrentDomain.BaseDirectory + @"\datawait");
                }
                else
                {
                    LogWriteLine("FAIL TO SAVE DATA. NO INFORMATION WILL BE LOAD LATE. MAJOR ERROR:" + end);
                }
            }
            LogWriteLine("Service stoped");
            log.Flush();
            log.Close();
        }
        /// <summary>
        /// Gets the last O.S and client code. Employee name and O.S state.
        /// </summary>
        private static void GetAllInfos()
        {
            Conection.DeskOpen();
            MySqlCommand sqlcommand = sqlcommand = new MySqlCommand("", Conection.DeskConection);
            sqlcommand.CommandText = "SELECT cod_os1, usu_os1, cl1_os1, stc_os1 FROM v11_mafra.OpOrdensServicoCabecalhos order by cod_os1 desc limit 1";
            using (MySqlDataReader datget = sqlcommand.ExecuteReader())
            {
                datget.Read();
                codOS = Convert.ToInt32(datget["cod_os1"]); //O.S code
                nomfun = datget["usu_os1"].ToString(); // employee name
                codcli = Convert.ToInt32(datget["cl1_os1"]); // cliente code
                osstate = Convert.ToInt32(datget["stc_os1"]); // O.S code state
                datget.Close();
            }
            sqlcommand.Cancel();
            Conection.DeskConection.Close();
        }
        /// <summary>
        /// Check if employee belong to tecnical group (code 4)
        /// </summary>
        /// <returns></returns>
        private static int GetGroupCode()
        {
            Conection.DeskOpen();
            MySqlCommand sqlcommand = sqlcommand = new MySqlCommand("", Conection.DeskConection);
            sqlcommand.CommandText = "select gru_se1 from cadastrossenhasusuariosv11 where cod_se1 like '%" + nomfun + "%'";
            int getstate = Convert.ToInt32(sqlcommand.ExecuteScalar());
            sqlcommand.Cancel();
            Conection.DeskConection.Close();
            return getstate;
        }
        /// <summary>
        /// Get employee code 
        /// </summary>
        private static void GetFunCode()
        {
            Conection.DeskOpen();
            MySqlCommand sqlcommand = new MySqlCommand("", Conection.DeskConection);
            sqlcommand.CommandText = "select cod_fu1 from cadastrosfuncionarios where nom_fu1 like '%" + nomfun + "%'";
            try
            {
                cod_fun = Convert.ToInt32(sqlcommand.ExecuteScalar());
                lastOS = codOS;
            }
            catch (Exception e)
            {
                LogWriteLine("CODE 123 EXECUTESCALAR ERROR. MSG->" + e.Message);
            }
        }
        /// <summary>
        /// Check if O.S is already finished. (Code 81 = unfinished; 83 = finished)
        /// </summary>
        /// <returns></returns>
        private static int StateOS()
        {
            try
            {
                Conection.DeskOpen();
                MySqlCommand sqlcommand = new MySqlCommand("", Conection.DeskConection);
                sqlcommand.CommandText = "SELECT stc_os1 FROM v11_mafra.OpOrdensServicoCabecalhos where cod_os1 = " + codOS;
                int getstate = Convert.ToInt32(sqlcommand.ExecuteScalar());
                sqlcommand.Cancel();
                Conection.DeskConection.Close();
                return getstate;
            }
            catch (Exception e)
            {
                LogWriteLine("CODE 168 FAIL TO GET THE STATE OF O.S " + codOS + " ERROR: " + e.Message);
                return 0;
            }
        }
        /// <summary>
        /// Coleta todas as informações necessárias da ultima O.S lançada, e verifica se deve enviar o email de satisfação
        /// </summary>
        public static void SatisfactionSenderSeeker()
        {
            try
            {
                GetAllInfos();
            }
            catch (Exception e)
            {
                LogWriteLine("CODE 99 TRYCATCHERROR. MESSAGE: " + e.Message);
            }
            if (codOS > lastOS) //if it's the last O.S recorded
            {
                try
                {
                    if (GetGroupCode() == 4) // If empl belong to tecnical department
                    {
                        GetFunCode();

                        if (StateOS() == 83)// If O.S is already done
                        {
                            try
                            {
                                GreenSignal();
                            }
                            catch (Exception e)
                            {
                                LogWriteLine("CODE 133 UNKOWNERROR. MESSAGE: " + e.Message);
                            }
                        }
                        else
                        {
                            LogWriteLine("O.S " + codOS + " wasn't finished yet");
                            //otherwise o.s code is recorded to a list to be checked later
                            WaitList.Add(new InformationOS(codOS, nomfun, codcli, osstate, cod_fun));
                        }
                    }
                }
                catch (Exception e)
                {
                    LogWriteLine("CODE 146 TRYCATCHERROR. MESSAGE: " + e.Message);
                }
            }
        }
        /// <summary>
        /// Verify if O.S informations in List<>WaitList are done already 
        /// </summary>
        public static void CheckList()
        {
            LogWriteLine("-------------------Executing unfinished O.S vector-------------------");
            Conection.DeskOpen();
            MySqlCommand sqlcommand = new MySqlCommand("", Conection.DeskConection);
            //This method is basically the same thing than the SatisfactionSenderSeeker(). the only difference is that this method already have the os number.
            for(int i = 0; i < WaitList.Count; i++)
            {
                sqlcommand.CommandText = "SELECT stc_os1 FROM v11_mafra.OpOrdensServicoCabecalhos where cod_os1 = " + WaitList[i].Cod;
                try
                {
                    int getstate = Convert.ToInt32(sqlcommand.ExecuteScalar());
                    if (getstate == 83)
                    {
                        InformationOS aux  = WaitList[i];
                        WaitList.Remove(WaitList[i]);
                        GreenSignal(aux, i);
                        System.Threading.Thread.Sleep(1000);
                    }
                }
                catch (Exception e)
                {
                    LogWriteLine("CODE 168 FAIL TO GET THE STATE OF O.S " + WaitList[i].Cod + " ERROR: " + e.Message);
                }
            }
            sqlcommand.Cancel();           
            Conection.DeskConection.Close();
        }
        /// <summary>
        /// Send O.S finished. Count how many erros the method send return. if no one email was sent, this method will return false
        /// </summary>
        /// <param name="variableCusto"></param>
        /// <param name="emplo"></param>
        private static bool ForeachToSend(Customer variableCusto, Employee emplo)
        {
            if (variableCusto.Email.Count >= 1)
            {
                int count = 0;
                StreamWriter SendLog = new StreamWriter(AppDomain.CurrentDomain.BaseDirectory + @"\EmailsSentLog.txt", true);
                SendLog.AutoFlush = true;
                SendLog.WriteLine(DateTime.Now + "    PREPARING TO SEND TO CUSTOMER: " + variableCusto.Name);
                List<string> FAILEMAILS = new List<string>();
                foreach (string mail in variableCusto.Email)
                {
                    try
                    {
                        if (!String.IsNullOrEmpty(mail))
                        {
                            string ans = Email.Send("mafra@mafrainformatica.com.br", mail, "mafra123@", "Mafra informática - Pesquisa de satisfação", variableCusto.Id_vip, emplo.Id_vip);
                            if (ans == null) SendLog.WriteLine(DateTime.Now + "    Email sent to: " + mail);
                            else
                            {
                                SendLog.WriteLine(ans);
                                FAILEMAILS.Add(mail);
                                count++;
                            }
                            System.Threading.Thread.Sleep(1000);
                        }
                    }
                    catch (Exception e)
                    {
                        log.WriteLine(DateTime.Now + "    CODE 185 FAIL TO SEND EMAIL TO" + mail + " ERROR: " + e.Message);
                        count++;
                    }
                }
                if(FAILEMAILS.Count > 0) variableCusto.RemoveEmail(FAILEMAILS);
                SendLog.Close();
                if (count == variableCusto.Email.Count) return false;
                else return true;
            }
            else {
                LogWriteLine("CUSTOMER HAVEN'T EMAILS REGISTERED. NO ONE SATISFATION FORMS WAS SENT. CUSTOMER ID->" + emplo.Id_vip);
                return false;
            }
        }
        /// <summary>
        /// Receives the O.S informations to send the email. If email sending was successful.
        /// The system check if it needs to register customer and/or employee.
        /// </summary>
        /// <param name="custo"></param>
        /// <param name="emp"></param>
        private static bool GreenSignalBody(Customer custo, Employee emp)
        {
            custo.Get_info();
            emp.Get_info();

            LogWriteLine("Sending emails...");

            if (ForeachToSend(custo, emp))
            {
                if (!custo.IsRegistered())
                {
                    LogWriteLine("Customer not registered. inserting client " + codcli);
                    custo.Register();
                }
                if (!emp.IsRegistered())
                {
                    LogWriteLine("Employee not registered. inserting employee " + cod_fun);
                    emp.Register();
                }
                LogWriteLine("Increasing number of forms sents do customer " + codcli);
                custo.IncreaseVisits();
                emp.IncreaseVisits();
            }
            else
            {
                LogWriteLine("No Email was able to send of cliente:" + codcli);
                return false;
            }
            return true;
        }
        /// <summary>
        /// Start when a instant check O.S is finished
        /// </summary>
        private static bool GreenSignal()
        {
            Customer custo = new Customer(codcli);
            Employee emp = new Employee(cod_fun);
            if (GreenSignalBody(custo, emp)) return true;
            else return false;
        }
        /// <summary>
        /// Execute when a storaged O.S information are now, finished
        /// </summary>
        /// <param name="info"></param>
        private static void GreenSignal(InformationOS info, int indexToRemove)
        {
            Customer custotemp = new Customer(info.Clientcode);
            Employee emptemp = new Employee(info.Codfun);
            if (GreenSignalBody(custotemp, emptemp)) WaitList.RemoveAt(indexToRemove);        
        }
    }
}
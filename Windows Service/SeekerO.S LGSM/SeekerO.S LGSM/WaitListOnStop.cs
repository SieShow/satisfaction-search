using System;
using System.Collections.Generic;
using System.IO;

namespace SeekerO.S_LGSM
{
    /// <summary>
    /// This class help the process to not lose his informations storaged when it be excluded
    /// </summary>
    static class WaitListOnStop
    {
        /// <summary>
        /// Save unfinished O.S into a file to be loaded late
        /// </summary>
        /// <param name="list"></param>
        public static string Save(List<InformationOS> list)
        {
            try
            {
                using (StreamWriter savedata = new StreamWriter(AppDomain.CurrentDomain.BaseDirectory + @"\datawait", true))
                {
                    savedata.AutoFlush = true;

                    foreach (InformationOS infos in list)
                    {
                        savedata.WriteLine("startof");
                        savedata.WriteLine("CLIENTCODE=" + infos.Clientcode);
                        savedata.WriteLine("CODE=" + infos.Cod);
                        savedata.WriteLine("FUNCODE=" + infos.Codfun);
                        savedata.WriteLine("FUNNAME=" + infos.Funname);
                        savedata.WriteLine("STATEOS=" + infos.Stateos);
                        savedata.WriteLine("endof");
                    }
                    savedata.Close();
                }
                return "";
            }
            catch (Exception e)
            {
                return e.ToString();
            }
        }

        /// <summary>
        /// Upload unfinished of file, getting your informations, and deleting it after the process finish
        /// </summary>
        /// <returns></returns>
        public static List<InformationOS> Load()
        {
            List<InformationOS> send = new List<InformationOS>();
            if (File.Exists(AppDomain.CurrentDomain.BaseDirectory + @"\datawait"))
            {
                Service1.LogWriteLine("Getting storaged informations");
                int codOS, codcli, osstate, cod_fun;
                string nomfun;
                using (StreamReader getdata = new StreamReader(AppDomain.CurrentDomain.BaseDirectory + @"\datawait"))
                {
                    string line;
                    while ((line = getdata.ReadLine()) != null)
                    {
                        if (line == "startof")
                        {
                            string[] split = getdata.ReadLine().Split('=');
                            codcli = Convert.ToInt32(split[1]);
                            split = getdata.ReadLine().Split('=');
                            codOS = Convert.ToInt32(split[1]);
                            split = getdata.ReadLine().Split('=');
                            cod_fun = Convert.ToInt32(split[1]);
                            split = getdata.ReadLine().Split('=');
                            nomfun = split[1];
                            split = getdata.ReadLine().Split('=');
                            osstate = Convert.ToInt32(split[1]);
                            send.Add(new InformationOS(codOS, nomfun, codcli, osstate, cod_fun));
                        }
                    }
                    getdata.Close();
                }
                try
                {
                    File.Delete(AppDomain.CurrentDomain.BaseDirectory + @"\datawait");
                }
                catch (Exception e)
                {
                    Service1.LogWriteLine("FAIL TO DELETE PROVISORY FILE OF O.S STATEMENTS. ERROR:" + e.ToString());
                }
            }
            return send;
        }
    }
}
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using MySql.Data.MySqlClient;
namespace SeekerO.S_LGSM
{
    class Customer : Entity
    {
        public Customer(int i)
        {
            id_vip = i;
        }

        /// <summary>
        /// Collect id, name and email about Customer by id
        /// </summary>
        public override void Get_info()
        {
            name = GetName();
            id_vip = GetId();
            email = GetEmails();
        }

        /// <summary>
        /// Retorna a lista de emails disponíveis de um determinado cliente
        /// </summary>
        /// <returns></returns>
        public List<string> GetEmails()
        {
            Conection.DeskOpen();
            List<string> listemails = new List<string>();
            command = new MySqlCommand("SELECT ema_cl1, www_cl1 from v11_mafra.cadastrosclientesfornecedoresrepresentadastransportadoras WHERE id__cl1 = " + id_vip, Conection.DeskConection);
            string add1, add2, aux2;
            string[] aux;

            using (MySqlDataReader read = command.ExecuteReader())
            {
                while (read.Read())
                {
                    if (!String.IsNullOrEmpty(read["ema_cl1"].ToString()) || !String.IsNullOrEmpty(read["www_cl1"].ToString()))
                    {
                        add1 = read["ema_cl1"].ToString();
                        add2 = read["www_cl1"].ToString();

                        aux = add1.Split(';');
                        foreach (string str in aux)
                        {
                            aux2 = str.Replace(" ", string.Empty);
                            listemails.Add(aux2);
                        }

                        aux = add2.Split(';');
                        foreach (string str in aux)
                        {
                            aux2 = str.Replace(" ", string.Empty);
                            listemails.Add(str);
                        }
                    }
                    else { break; }
                }
            }
            Conection.DeskConection.Close();
            return listemails;
        }

        public override string GetName()
        {
            Conection.DeskOpen();
            command.CommandText = "SELECT nom_cl1 from cadastrosclientesfornecedoresrepresentadastransportadoras where id__cl1 = " + id_vip;
            command.Connection = Conection.DeskConection;
            try
            {
                name = command.ExecuteScalar().ToString();
                return name;
            }
            catch(Exception e)
            {
                Service1.LogWriteLine("ERROR GETNAME() FROM CUSTOMER CLASS AT LINE 78 ERROR->" + e.Message);
                return "";
            }
        }

        public override int GetId()
        {
            Conection.DeskOpen();
            command.CommandText = "SELECT id__cl1 from cadastrosclientesfornecedoresrepresentadastransportadoras where nom_cl1 = '" + name + "'";
            command.Connection = Conection.DeskConection;
            id_vip = Convert.ToInt32(command.ExecuteScalar());
            Conection.DeskConection.Close();
            return id_vip;
        }

        /// <summary>
        /// When the form be sent, increase the number of sent forms
        /// </summary>
        public void IncreaseVisits()
        {
            Conection.WebOpen();
            command.CommandText = "SELECT tecnical_visits from customer where V11_ID =" + id_vip;
            command.Connection = Conection.WebConection;
            int aux = Convert.ToInt32(command.ExecuteScalar());
            aux++;
            command.CommandText = "UPDATE customer set tecnical_visits = " + aux + " where V11_ID = " + id_vip;
            command.Connection = Conection.WebConection;
            command.ExecuteNonQuery();
        }

        /// <summary>
        /// Check if the client is registered in Web Database
        /// </summary>
        /// <returns></returns>
        public override bool IsRegistered()
        {
            Conection.WebOpen();
            command.CommandText = "SELECT count(*) from customer where V11_ID = " + id_vip;
            command.Connection = Conection.WebConection;
            if (Convert.ToInt32(command.ExecuteScalar()) == 1)
            {
                return true;
            }
            else { return false; }
        }

        /// <summary>
        /// Insert new Customer into Web Database
        /// </summary>
        public override void Register()
        {
            string emailsAlign = "";
            email.Remove("");
            foreach (string em in email)
            {
                emailsAlign += em + " ";
            }
            command.CommandText = "INSERT INTO `customer`(`name`, `emails`, `tecnical_visits`, `forms_answereds`, `V11_ID`) " +
                "VALUES('" + name + "','" + emailsAlign + "', 0, 0, " + id_vip + ")";
            command.Connection = Conection.WebConection;
            command.ExecuteNonQuery();
        }
        /// <summary>
        /// Remove um email especificado
        /// </summary>
        /// <param name="mail"></param>
        public void RemoveEmail(string mail)
        {
            email.Remove(mail);
        }
        /// <summary>
        /// Remove emails especificado
        /// </summary>
        /// <param name="mail"></param>
        public void RemoveEmail(List<string> mails)
        {
            foreach(string mail in mails) email.Remove(mail);
        }
        /// <summary>
        /// Remove emails especificado
        /// </summary>
        /// <param name="mail"></param>
        public void RemoveEmail(string[] mails)
        {
            foreach (string mail in mails) email.Remove(mail);
        }
    }
}

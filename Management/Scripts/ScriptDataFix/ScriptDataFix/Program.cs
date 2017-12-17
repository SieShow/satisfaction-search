using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using MySql.Data.MySqlClient;
namespace ScriptDataFix
{
    class Program
    {
        static void Main(string[] args)
        {
            Conection.DatabaseN = "satisfactionbd";
            Conection.PwdN = "mafra1045@";
            Conection.UidN = "user";
            Conection.ServerN = "149.56.175.201";
            Conection.Port1 = "";
            List<String> ids = new List<string>();
            Console.WriteLine("Conection state: " + Conection.Open());

            Console.WriteLine("Collecting informations from CUSTOMER");

            MySqlCommand command = new MySqlCommand("select distinct idcustomer from form", Conection.Connection);
            using (MySqlDataReader data = command.ExecuteReader())
            {
                while (data.Read())
                {
                    ids.Add(data["idcustomer"].ToString());
                }
            }
            Console.WriteLine("Coletado " + ids.Count + " suarios");
            foreach (string id in ids)
            {
                Console.WriteLine("Coletando informações para o id " + id);
                Conection.Close();
                Conection.Open();
                command.CommandText = "select ROUND(avg(evaluation_value), 1) from form where idcustomer = " + id;
                command.Connection = Conection.Connection;

                string val = command.ExecuteScalar().ToString();

                if (val == null || val == "") val = "0";
                val = val.Replace(',', '.');

                Console.WriteLine("id " + id + " possui uma média de " + val + ". Atualizando registro...");
                Conection.Close();
                Conection.Open();
                command.CommandText = "update customer set avaliation_avarage = " + val + " where v11_id = " + id;
                command.Connection = Conection.Connection;
                command.ExecuteNonQuery();
            }

            Console.WriteLine("Atualização terminada");
            Console.ReadKey();
        }
    }
}

using MySql.Data.MySqlClient;
using ScriptDataFix;
using System;
using System.Collections.Generic;

namespace Evaluation_AvarageUpdate
{
    public static class ScriptNotaMedia
    {
        public static void Run()
        {
            List<string> ids = new List<string>();

            Conection_Information.Load();
            Console.WriteLine("Collecting informations from CUSTOMER");
            Console.WriteLine("Conection state: " + Conection.Open());

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
        }
    }
}

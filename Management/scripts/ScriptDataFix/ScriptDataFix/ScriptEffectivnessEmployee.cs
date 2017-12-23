using MySql.Data.MySqlClient;
using ScriptDataFix;
using System;
using System.Collections.Generic;

namespace Evaluation_AvarageUpdate
{
    class ScriptEffectivnessEmployee
    {
        public static void Run()
        {
            Conection_Information.Load();
            List<Customer> customers = new List<Customer>();

            Conection_Information.Load();
            Console.WriteLine("Collecting informations from EMPLOYEE");
            Console.WriteLine("Conection state: " + Conection.Open());

            MySqlCommand command = new MySqlCommand("select distinct idcustomer, ssue_sol_avarage, forms_answereds from customer", Conection.Connection);

            using (MySqlDataReader data = command.ExecuteReader())
            {
                while (data.Read())
                {
                    customers.Add(new Customer(int.Parse(data["idcustomer"].ToString()),
                        int.Parse(data["tecnical_visits"].ToString()), int.Parse(data["forms_answereds"].ToString())));
                }
            }

            Console.WriteLine("Coletado " + customers.Count + " suarios");
            foreach (Customer customer in customers)
            {
                Console.WriteLine("Atualizando informações do cliente: " + customer.Id);
                Console.WriteLine("Visitas técnicas: " + customer.Visitas);
                Console.WriteLine("Formulários respondidos: " + customer.Forms_respondidos);
                Console.WriteLine("Média: " + customer.CalculateMedia());
                Console.WriteLine("");

                if (customer.Id == 0)
                {
                    command.CommandText = "update customer set tecnical_visits = 1 where v11_id = " + customer.Id;
                }
                else
                {
                    command.CommandText = "update customer set effectiviness = " + customer.CalculateMedia() + " where idcustomer = " + customer.Id;
                }

                command.Connection = Conection.Connection;
                command.ExecuteNonQuery();
            }
            Console.WriteLine("Atualização finalizada.");
        }
    }
}

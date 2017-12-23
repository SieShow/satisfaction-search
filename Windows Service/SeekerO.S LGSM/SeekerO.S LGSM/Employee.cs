using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

namespace SeekerO.S_LGSM
{
    class Employee : Entity
    {
        public Employee(int i)
        {
            id_vip = i;
        }

        public override string GetName()
        {
            Conection.DeskOpen();
            command.CommandText = "SELECT nom_fu1 from cadastrosfuncionarios where cod_fu1 = " + id_vip;
            command.Connection = Conection.DeskConection;
            name = command.ExecuteScalar().ToString();
            Conection.DeskConection.Close();
            return name;
        }
        public override void Register()
        {
            Conection.WebOpen();
            command.CommandText = "INSERT INTO `employee`(`name`, `note_avarage`, `issue_sol_avarage`,`V11_code`,`visits`) VALUES('" + name + "' ,0,0, " + id_vip + ", 1)";
            command.Connection = Conection.WebConection;
            command.ExecuteNonQuery();
            Conection.WebConection.Close();
        }
        public override int GetId()
        {
            Conection.DeskOpen();
            command.CommandText = "SELECT cod_fu1 from cadastrosfuncionarios where nom_fu1 = '" + name + "'";
            command.Connection = Conection.DeskConection;
            id_vip = Convert.ToInt32(command.ExecuteScalar());
            Conection.DeskConection.Close();
            return id_vip;
        }

        /// <summary>
        /// Check if the client is registered in Web Database
        /// </summary>
        /// <returns></returns>
        public override bool IsRegistered()
        {
            Conection.WebOpen();
            command.CommandText = "SELECT count(*) from employee where V11_code = " + id_vip;
            command.Connection = Conection.WebConection;
            if (Convert.ToInt32(command.ExecuteScalar()) == 1)
            {
                Conection.WebConection.Close();
                return true;
            }
            else
            {
                Conection.WebConection.Close();
                return false;
            }
        }
        public void IncreaseVisits()
        {
            Conection.WebOpen();
            command.CommandText = "SELECT visits from employee where V11_code =" + id_vip;
            command.Connection = Conection.WebConection;
            int aux = Convert.ToInt32(command.ExecuteScalar());
            aux++;
            command.CommandText = "UPDATE employee set visits = " + aux + " where V11_code = " + id_vip;
            command.Connection = Conection.WebConection;
            command.ExecuteNonQuery();
        }
    }
}

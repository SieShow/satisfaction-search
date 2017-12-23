using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using MySql.Data.MySqlClient;

namespace SeekerO.S_LGSM
{
    class TEST
    {
        //Variables for WebTest
        private static string _TESTwebserverIP = "localhost";
        private static string _TESTwebserverDATABASE_NAME = "satisfactionbd";
        private static string _TESTwebserverUSER = "user";
        private static string _TESTwebserverPASSWORD = "mafra1045@";
        public static string TESTwebserverIP { get => _TESTwebserverIP; }
        public static string TESTwebserverDATABASE_NAME { get => _TESTwebserverDATABASE_NAME; }
        public static string TESTwebserverUSER { get => _TESTwebserverUSER; }
        public static string TESTwebserverPASSWORD { get => _TESTwebserverPASSWORD; }

        public static MySqlConnection DeskConection { get => deskConection; set => deskConection = value; }
        public static MySqlConnection WebConection { get => webConection; set => webConection = value; }

        public static bool WebTEST()
        {
            string constring = "server=" + _TESTwebserverIP + ";database=" + _TESTwebserverDATABASE_NAME + ";user=" + _TESTwebserverUSER + ";password=" + _TESTwebserverPASSWORD + ";";
            webConection = new MySqlConnection(constring);
            try
            {
                webConection.Open();
                return true;
            }
            catch (Exception e)
            {
                Service1.LogWriteLine("WEB SERVER CONECTION FAIL. ERRO->" + e.Message);
                return false;
            }
        }
    }
}

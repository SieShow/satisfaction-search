using System;
using MySql.Data.MySqlClient;
using System.IO;
using System.Threading;
using System.Net;

namespace SeekerO.S_LGSM
{
    public class Conection
    {
        private static MySqlConnection deskConection, webConection;

        //Default Desktop variables
        private static string _DesktopServerIP = "192.168.254.1";
        private static string _DesktopServerDATABASE_NAME = "V11_Mafra";
        private static string _DesktopServerUSER = "root";
        private static string _DesktopServerPASSWORD = "mafra1045@";
        private static string _DesktopServerPORT = "3306";
        public static string DesktopServerIP { get => _DesktopServerIP; }
        public static string DesktopServerDATABASE_NAME { get => _DesktopServerDATABASE_NAME; }
        public static string DesktopServerUSER { get => _DesktopServerUSER; }
        public static string DesktopServerPASSWORD { get => _DesktopServerPASSWORD; }
        public static string DesktopServerPORT { get => _DesktopServerPORT; }

        //Default Web variables
        private static string _WebServerIP = "149.56.175.201";
        private static string _WebServerDATABASE_NAME = "satisfactionbd";
        private static string _WebServerUSER = "user";
        private static string _WebServerPASSWORD = "mafra1045@";
        public static string WebServerIP { get => _WebServerIP; set => _WebServerIP = value; }
        public static string WebServerDATABASE_NAME { get => _WebServerDATABASE_NAME; }
        public static string WebServerUSER { get => _WebServerUSER; }
        public static string WebServerPASSWORD { get => _WebServerPASSWORD; }

        public static MySqlConnection DeskConection { get => deskConection; set => deskConection = value; }
        public static MySqlConnection WebConection { get => webConection; set => webConection = value; }



        public static bool DeskOpen()
        {
            string builder = @"SERVER="+_DesktopServerIP+";PORT="+_DesktopServerPORT+";DATABASE="+_DesktopServerDATABASE_NAME+";UID="+_DesktopServerUSER+";PWD="+_DesktopServerPASSWORD+"";
            deskConection = new MySqlConnection(builder);
            try
            {
                deskConection.Open();
                return true;
            }
            catch (Exception e)
            {
                Service1.LogWriteLine("DESKTOP SERVER CONECTION FAIL. ERRO->" + e.Message);
                return false;
            }
        }

        /// <summary>
        /// Open web server conection with defaults variables 
        /// </summary>
        /// <returns></returns>
        public static bool WebOpen()
        {
            string constring = "server="+_WebServerIP+";database="+_WebServerDATABASE_NAME+";user="+_WebServerUSER+";password="+_WebServerPASSWORD+";";
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
        /// <summary>
        /// Attempt to connect to internet
        /// </summary>
        /// <returns></returns>
        public static bool InternetTest()
        {
            try
            {
                using (var cliente = new WebClient())
                {
                    using (var teste = cliente.OpenRead("http://www.google.com.br"))
                    {

                        return true;

                    }
                }
            }
            catch
            {

                return false;
            }
        }
        /// <summary>
        /// Attempts to conect to destktop server. if it fails, successive attempts will be performed until connection is successfully established
        /// </summary>
        public static void DesktopServerProcedure()
        {
            if (!DeskOpen())
            {
                Service1.LogWriteLine("# DESKTOP SERVER CONECTION ERROR #");
                Service1.LogWriteLine("Unable to conect to DesktopServer with the follow data. SERVER IP:  " + DesktopServerIP + ", SERVER NAME: " + DesktopServerDATABASE_NAME +
                    ", SERVER PORT: " + Conection.DesktopServerPORT + ", SERVER USER NAME: " + DesktopServerUSER + ", SERVER PASSWORD: " + DesktopServerPASSWORD);
                Service1.LogWriteLine("The system will try to connect every 20 seconds(20000 ms).");
                bool re = false;

                for (int i = 0; re == false; i++)
                {
                    re = DeskOpen();
                    if (re == false) Service1.LogWriteLine("Attempt " + i.ToString("D2") + " fail");
                    else Service1.LogWriteLine("Connection estableshid successful. System will return the operation");
                    Thread.Sleep(20000);
                }
            }
        }
        /// <summary>
        /// Attempts to conect to internet. if it fails, successive attempts will be performed until connection is successfully established
        /// </summary>
        /// <param name="est"></param>
        public static void InternetProcedure(bool est = false)
        {
            if (!InternetTest())
            {
                Service1.LogWriteLine("ERRO 002 No internet connection. Please, check it out");
                Service1.LogWriteLine("The system will try to connect every 20 seconds(20000 ms).");
                for (int i = 0; est == false; i++)
                {
                    est = InternetTest();
                    if (est == false) Service1.LogWriteLine("Attempt " + i.ToString("D2") + " fail");
                    else Service1.LogWriteLine("Connection estableshid successful. System will return the operation");
                    Thread.Sleep(20000);
                }
            }
        }
        /// <summary>
        /// Attempts to conect to Web Server. if it fails, successive attempts will be performed until connection is successfully established
        /// </summary>
        public static void WebServerProcedure()
        {
            if (!WebOpen())
            {
                Service1.LogWriteLine("# WEB SERVER CONECTION ERROR #");
                Service1.LogWriteLine("Unable to conect to WebServer with the follow data. SERVER IP:  " + DesktopServerIP + ", SERVER NAME: " + DesktopServerDATABASE_NAME +
                    ", SERVER PORT: " + Conection.DesktopServerPORT + ", SERVER USER NAME: " + DesktopServerUSER + ", SERVER PASSWORD: " + DesktopServerPASSWORD);
                Service1.LogWriteLine("The system will try to connect every 20 seconds(20000 ms).");
                bool re = false;

                for (int i = 0; re == false; i++)
                {
                    re = DeskOpen();
                    if (re == false) Service1.LogWriteLine("Attempt " + i.ToString("D2") + " fail");
                    else Service1.LogWriteLine("Connection estableshid successful. System will return the operation");
                    Thread.Sleep(20000);
                }
            }
        }
    }
}
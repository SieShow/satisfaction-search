using ScriptDataFix;
using System;
using System.Collections.Generic;

namespace Evaluation_AvarageUpdate
{
    class Conection_Information
    {
        public static void Load()
        {
            Conection.DatabaseN = "satisfactionbd";
            Conection.PwdN = "mafra1045@";
            Conection.UidN = "user";
            Conection.ServerN = "149.56.175.201";
            Conection.Port1 = "";
            List<String> ids = new List<string>();
        }
    }
}

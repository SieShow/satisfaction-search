using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using MySql.Data.MySqlClient;
using Evaluation_AvarageUpdate;

namespace ScriptDataFix
{
    class Program
    {
        static void Main(string[] args)
        {
            //ScriptNotaMedia.Run();
            ScriptEffectiviness.Run();
            Console.ReadKey();
        }
    }
}

using System;
using System.Collections.Generic;
using System.Linq;
using System.ServiceProcess;
using System.Text;
using System.IO;
namespace SeekerO.S_LGSM
{
    static class Program
    {
        /// <summary>
        /// The main entry point for the application.
        /// </summary>
        static void Main()
        {
#if (!DEBUG)
            ServiceBase[] ServicesToRun;
            ServicesToRun = new ServiceBase[]
            {
                new Service1()
            };
            ServiceBase.Run(ServicesToRun);  
#else
            Email.Send("mafra@mafrainformatica.com.br", "lucas@mafrainformatica.com.br", "mafra123@", "Mafra informática - Pesquisa de satisfação", 123, 321);
#endif
        }
    }
}

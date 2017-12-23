using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

namespace SeekerO.S_LGSM
{
    public class InformationOS
    {
        private int cod;
        private string funname;
        private int codfun;
        private int clientcode; 
        private int stateos; 
        
        /// <summary>
        /// code of O.S (only technical visit O.S
        /// </summary>
        public int Cod { get => cod; set => cod = value; }
        /// <summary>
        /// Employee name
        /// </summary>
        public string Funname { get => funname; set => funname = value; }
        /// <summary>
        /// Employee code (employees of company sector equal 4(tecnical)
        /// </summary>
        public int Codfun { get => codfun; set => codfun = value; }
        /// <summary>
        /// Customer Code
        /// </summary>
        public int Clientcode { get => clientcode; set => clientcode = value; }
        /// <summary>
        /// State of O.S (81 => unfinished // 83 => finished // 0 => no state was setted
        /// </summary>
        public int Stateos { get => stateos; set => stateos = value; }

        public InformationOS(int c, string fun, int cli, int stat, int codf)
        {
            this.cod = c;
            this.funname = fun;
            this.clientcode = cli;
            this.stateos = stat;
            this.codfun = codf;
        }
    }
}

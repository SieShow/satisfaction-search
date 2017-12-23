using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using MySql.Data.MySqlClient;
namespace SeekerO.S_LGSM
{
    public abstract class Entity
    {
        protected int id_vip;
        protected string name;
        protected List<string> email;

        public List<string> Email { get => email; }
        public string Name { get => name; }
        public int Id_vip { get => id_vip; }

        protected static MySqlCommand command = new MySqlCommand();

        /// <summary>
        /// Collect id, name and email about Customer by id
        /// </summary>
        public virtual void Get_info()
        {
            name = GetName();
            id_vip = GetId();
        }
        public abstract string GetName();
        public abstract void Register();
        public abstract int GetId();
        public abstract bool IsRegistered();
    }
}

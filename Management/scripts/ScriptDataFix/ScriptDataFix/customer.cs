namespace Evaluation_AvarageUpdate
{
    class Customer
    {
        private int id;
        private int visitas;
        private int forms_respondidos;
        
        public int Id { get { return this.id; } }
        public int Visitas { get { return this.visitas; } }
        public int Forms_respondidos { get { return this.forms_respondidos; } }

        public Customer(int id, int visitas, int forms)
        {
            this.id = id;
            this.visitas = visitas;
            this.forms_respondidos = forms;
        }
        public double CalculateMedia()
        {
            try
            {
                return (forms_respondidos * 100) / visitas;
            }
            catch
            {
                return 0;
            }

        }
    }
}

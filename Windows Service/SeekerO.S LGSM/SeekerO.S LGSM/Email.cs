using System;
using System.Net.Mail;
using System.Net;
using System.IO;
using System.Text;

namespace SeekerO.S_LGSM
{
    class Email
    {
        private static MailMessage MailCopy(string from, string body)
        {
            MailMessage mailcopy = new MailMessage(from, "tulio@mafrainformatica.com.br");
            mailcopy.BodyEncoding = UTF8Encoding.UTF8;
            mailcopy.Subject = "Pesquisa de satisfação Mafra - Cópia de envio";
            mailcopy.IsBodyHtml = true;

            LinkedResource inlineLogo = new LinkedResource(AppDomain.CurrentDomain.BaseDirectory + @"\logo.png");
            inlineLogo.ContentId = Guid.NewGuid().ToString();
            var view = AlternateView.CreateAlternateViewFromString(body, null, "text/html");
            view.LinkedResources.Add(inlineLogo);
            mailcopy.AlternateViews.Add(view);
            return mailcopy;
        }
        private static string BuildMSG(int cod_client, int cod_func, LinkedResource link)
        {
            string msg = "";
            using (StreamReader red = new StreamReader(AppDomain.CurrentDomain.BaseDirectory + "Button.html"))
            {
                string lin;
                int aux = 1;
                while ((lin = red.ReadLine()) != null)
                {
                    if (lin == "                        <img style=\"margin-top:10px;\" src=\"http://mafrainformatica.com.br/Satisfaction-Search/Img/mafra.png\">")
                    {
                        lin = "<img style=\"margin-top:-10px;\"src=\"cid:" + link.ContentId + "\">";
                    }
                    else if (lin == "                                                <td value=\"Abrir questionário\" name=\"\" align=\"center\" style=\"border-radius: 3px; background-color: #2b3a63; font-size: 20px;\"><a href=\"http://mafrainformatica.com.br/Satisfaction-Search/form.php\" style=\" font-family: Helvetica, Arial, sans-serif; color: #ffffff; text-decoration: none; color: #ffffff; text-decoration: none; padding: 15px 25px; border-radius: 2px; border: 1px solid #2b3a63; cursor: pointer; display: inline-block;\">Abrir questionário</a></td>")
                    {
                        lin = "<td type=\"submit\" value=\"Abrir questionário\" name=\"\" align=\"center\" style=\"border-radius: 3px; background-color: #2b3a63; font-size: 20px; color: #fff;\"><a href=\"http://mafrainformatica.com.br/Satisfaction-Search/form.php?custoid=" + cod_client + "&emplid=" + cod_func + "&datesent=" + DateTime.Now.ToString("yyyy/MM/dd") + "\" style=\" font-family: Helvetica, Arial, sans-serif; color: #ffffff; text-decoration: none; color: #ffffff; text-decoration: none; padding: 15px 25px; border-radius: 2px; border: 1px solid #2b3a63; cursor: pointer; display: inline-block;\">Abrir questionário</a></td>";
                    }
                    aux++;
                    msg += lin;
                }
            }
            return msg;
        }
        /// <summary>
        /// Get informations about 'from' and 'to' send a email and return if it was made with successful
        /// </summary>
        /// <param name="from"></param>
        /// <param name="to"></param>
        /// <param name="from_password"></param>
        /// <param name="title"></param>
        /// <param name="cod_client"></param>
        /// <param name="cod_func"></param>
        /// <returns></returns>
        public static string Send(string from, string to, string from_password, string title, int cod_client, int cod_func)
        {
            try
            {
                SmtpClient client = new SmtpClient("mail.mafrainformatica.com.br", 587);
                client.EnableSsl = false;
                client.Timeout = 10000;
                client.DeliveryMethod = SmtpDeliveryMethod.Network;
                client.UseDefaultCredentials = false;
                client.Credentials = new NetworkCredential(from, from_password);
                MailMessage mail = new MailMessage(from, to);               

                mail.BodyEncoding = UTF8Encoding.UTF8;
                mail.Subject = title;
                mail.IsBodyHtml = true;

                LinkedResource inlineLogo = new LinkedResource(AppDomain.CurrentDomain.BaseDirectory + @"\logo.png");
                inlineLogo.ContentId = Guid.NewGuid().ToString();

                string body = BuildMSG(cod_client, cod_func, inlineLogo);

                var view = AlternateView.CreateAlternateViewFromString(body, null, "text/html");
                view.LinkedResources.Add(inlineLogo);
                mail.AlternateViews.Add(view);

                client.Send(mail);
                client.Send(MailCopy(from, body));
                return null;
            }
            catch(Exception e)
            {
                return "FAIL IN SEND EMAIL TO: " + to + " ERROR CODE->" + e.Message;
            }
        }
    }
}

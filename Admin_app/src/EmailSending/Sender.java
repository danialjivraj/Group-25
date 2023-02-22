package EmailSending;

import java.io.IOException;
import java.util.Properties;

import javax.mail.Message;
import javax.mail.MessagingException;
import javax.mail.NoSuchProviderException;
import javax.mail.Session;
import javax.mail.Transport;
import javax.mail.internet.AddressException;
import javax.mail.internet.InternetAddress;
import javax.mail.internet.MimeBodyPart;
import javax.mail.internet.MimeMessage;
import javax.mail.internet.MimeMultipart;


public class Sender {
	MimeMessage mimeMessage=null;
	Session newSession=null;
	String userTosend="";
	String info="";
	public Sender(String userTosend,String info) throws AddressException, MessagingException, IOException{
		this.userTosend=userTosend;
		this.info=info;
		SetupServerProperties();
		draftEmail();
		SendEmail();
	}
	public void SendEmail() throws MessagingException {
		String fromUser="titantop1tap@gmail.com";
		String fromUserPass="qthjkmprusaewxrt";
		String emailHost="smtp.gmail.com";
		Transport transport =newSession.getTransport("smtp");
		transport.connect(emailHost,fromUser,fromUserPass);
		transport.sendMessage(mimeMessage, mimeMessage.getAllRecipients());
		transport.close();
		//System.out.println("done");
	}
	private MimeMessage draftEmail() throws AddressException, MessagingException, IOException {
		String[] emailReceipients = {userTosend};  //Enter list of email recepients
		String emailSubject = "Golden River Admin Report";
		String emailBody = info;
		mimeMessage = new MimeMessage(newSession);
		
		for (int i =0 ;i<emailReceipients.length;i++)
		{
			mimeMessage.addRecipient(Message.RecipientType.TO, new InternetAddress(emailReceipients[i]));
		}
		mimeMessage.setSubject(emailSubject);
	   
	    
	    
		 MimeBodyPart bodyPart = new MimeBodyPart();
		 bodyPart.setContent(emailBody,"text/html; charset=utf-8");
		 MimeMultipart multiPart = new MimeMultipart();
		 multiPart.addBodyPart(bodyPart);
		 mimeMessage.setContent(multiPart);
		 return mimeMessage;
	}
	public void  SetupServerProperties() {
		Properties pr =System.getProperties();
		pr.put("mail.smtp.port","587");
		pr.put("mail.smtp.auth", true);
		pr.put("mail.smtp.starttls.enable", true);
		newSession=  Session.getDefaultInstance(pr,null);
	}
}
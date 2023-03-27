package EmailSending;

import java.io.IOException;
import java.sql.SQLException;

import javax.mail.MessagingException;
import javax.mail.internet.AddressException;

import GUIs.HomePageGUI;

public class Testet {

	public static void main(String[] args) throws AddressException, MessagingException, IOException, SQLException {
		// TODO Auto-generated method stub
		//Report rep=new Report(); 
		//Sender sender=new Sender("titantop1tap@gmail.com",rep.makeReport());
		new HomePageGUI("titantop1tap@gmail.com");
	}

}

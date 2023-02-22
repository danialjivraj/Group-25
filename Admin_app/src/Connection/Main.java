package Connection;

import java.sql.SQLException;

import EmailSending.Report;
import GUIs.LoginPage;
import GUIs.ProductsManipulator;

import java.sql.Date;

public class Main {

	public static void main(String[] args) throws SQLException {
		// TODO Auto-generated method stub
		//DBorder dba=new DBorder();
		//test
		//Date date=new Date(31,03,2002);
		//dba.createRecordAccount("1234567890","ush@mail.ru","Kirill","Ushakov","Male",new Date(2002,03,31),1,"TestPass");
		
		//dba.changeStatusOfOrder("2",1);
		//dba.closeConnection();
		//Sender send = new Sender();
		
		//DBproductAndCategory p = new DBproductAndCategory();
		//p.listOfEndingProducts();
		
		//Report rep=new Report();
		//rep.makeReport();
		
		new LoginPage();
	}

}

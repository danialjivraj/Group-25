package Testing;

import static org.junit.jupiter.api.Assertions.*;

import java.sql.SQLException;

import org.junit.jupiter.api.Test;

import Connection.DBaccount;
import Connection.DBproductAndCategory;

class TestAP {

	@Test
	void fUserTest() throws SQLException {
		//Test user finding system
		String ID="24";
		String Email="farazahmed9910@gmail.com";
		DBaccount DBA=new DBaccount();
		assertEquals(Email,DBA.getUser(ID).getString("email"));
	}
	
	@Test
	void fProductTest() throws SQLException {
		//Test product finding system
		String ID="4";
		String Name="Gold Pendant Necklace";
		DBproductAndCategory DBAC=new DBproductAndCategory();
		assertEquals(Name,DBAC.findProduct(ID).getString("Product_Name"));
	}
	
	@Test
	void LoginTest() throws SQLException {
		String Log="kirill@gmail.com";
		String Pass="12345678";
		DBaccount ACC=new DBaccount();
		System.out.println(ACC.login(Log, Pass));
		assertEquals(true,ACC.login(Log, Pass));
		
	}

}

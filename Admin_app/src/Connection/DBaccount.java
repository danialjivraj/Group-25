package Connection;

import java.sql.Date;
import java.sql.SQLException;

public class DBaccount extends DataBaseConn{
//The class is used to control data related to account table
	
	
	public void createRecordAccount(String Phone_Number,String Email,String User_Name,String User_Surname,
			String User_Sex,Date DOB,int User_Status,String User_Password) throws SQLException {
		//The method is used to create an account 
		//Parameters have the same names as in the database
		
		String StatusSQL=StatusMaker(User_Status);
		
		String sql="INSERT INTO account (Phone_Number,Email,User_Name,User_Surname,User_Sex,User_DOB,User_Status,User_Password	) "
				+ "VALUES ('"+Phone_Number+"','"+Email+"','"+User_Name+"','"+User_Surname+"','"+User_Sex+"','"+DOB+"','"+StatusSQL+"','"+User_Password+"');";
		
		getStmt().executeUpdate(sql);
		
		System.out.println("Creation of account was successful..");
	}
	public void changeStatusTo(String ID,int Status) throws SQLException {
		//The method is used to change the status of user
		//ID of the user is required 
		//Status is required:
		// 1 - Customer
		// 2 - Admin
		
		String StatusSQL=StatusMaker(Status);
		
	
		
		String sql= "UPDATE account "
				+ "SET User_Status = '"+StatusSQL+"' "
				+ "WHERE Account_ID="+ID+";";
		
		getStmt().executeUpdate(sql);
		
		System.out.println("Change of status was successful..");
		
	}
	
	public void changeEmailTo(String ID,String Email) throws SQLException {
		//The method is used to change the email of user
		//ID of the user is required 
		//Email is required:
	
		
	
		String sql= "UPDATE account "
				+ "SET Email = '"+Email+"' "
				+ "WHERE Account_ID="+ID+";";
		
		getStmt().executeUpdate(sql);
		
		System.out.println("Change of email was successful..");
		
	}
	
	
	public String StatusMaker(int Status) {
		
		
		String StatusSQL;
		
		if(Status==1) {
			StatusSQL="Customer";
		}
		else if(Status==2) {
			StatusSQL="Admin";
		}
		else {
			throw new IllegalStateException("Unknown parameter for Status (1 or 2 )");
		}
		return StatusSQL;
	}
}

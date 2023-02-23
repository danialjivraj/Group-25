package Connection;

import java.sql.Date;
import java.sql.ResultSet;
import java.sql.SQLException;

public class DBaccount extends DataBaseConn{
//The class is used to control data related to users table
	
	
	public void createRecordAccount(String Phone_Number,String Email,String User_Name,String User_Surname,
			String User_Sex,Date DOB,int User_Status,String User_Password) throws SQLException {
		//The method is used to create an account 
		//Parameters have the same names as in the database
		
		String StatusSQL=StatusMaker(User_Status);
		
		String sql="INSERT INTO users (Phone_Number,email,name,User_Surname,User_Sex,User_DOB,User_Status,password	) "
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
		
	
		
		String sql= "UPDATE users "
				+ "SET User_Status = '"+StatusSQL+"' "
				+ "WHERE id="+ID+";";
		
		getStmt().executeUpdate(sql);
		
		System.out.println("Change of status was successful..");
		
	}
	
	public void changeEmailTo(String ID,String Email) throws SQLException {
		//The method is used to change the email of user
		//ID of the user is required 
		//Email is required:
	
		
	
		String sql= "UPDATE users "
				+ "SET email = '"+Email+"' "
				+ "WHERE id="+ID+";";
		
		getStmt().executeUpdate(sql);
		
		System.out.println("Change of email was successful..");
		
	}
	
	public boolean login(String email,String password) throws SQLException {
		boolean result;
		String sql="SELECT COUNT(*) AS recordCount FROM users WHERE email='"+email+"' AND password = '"+password+"' AND User_Status = 'Admin'";
		ResultSet rs = getStmt().executeQuery(sql);
		rs.next();
		int count = rs.getInt("recordCount");
		//System.out.println("MyTable has " + count + " row(s).");
		
		if(count==1) {return true;}
		else {return false;}
		
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

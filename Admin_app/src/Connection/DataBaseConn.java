package Connection;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.SQLException;
import java.sql.Statement;

public abstract class DataBaseConn {
	// The class is used to create a connection to the database
	
	
	private Connection c;
	private Statement stmt;
	 PreparedStatement preparedStmt;
	


	DataBaseConn(){
		//Connection to the database
		
		try {
		Class.forName("com.mysql.jdbc.Driver");
		 c=DriverManager.getConnection("jdbc:mysql://localhost/goldenriver","root","");
		 setStmt(c.createStatement());
		
		System.out.println("Connection is successful..");
		
		}catch(Exception e) {
			System.out.println("Error:");
			System.out.println(e);
		}		
	}
	
	public void closeConnection() throws SQLException {
		//Used to close connection of the DB
		c.close();
	}
	
	public Connection getConnection() {
		return c;
	}

	
	public Statement getStmt() {
		return stmt;
	}

	public void setStmt(Statement stmt) {
		this.stmt = stmt;
	}
	
	public PreparedStatement getPreparedStmt() {
		return preparedStmt;
	}

	public void setPreparedStmt(PreparedStatement preparedStmt) {
		this.preparedStmt = preparedStmt;
	}
	


}

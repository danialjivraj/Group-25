package Connection;

import java.sql.SQLException;

public class DBmaterial extends DataBaseConn{
//This class exists to control the material table 
//Subclass of DataBaseConn
	
	public void createRecordMaterial(String MaterialName) throws SQLException {
		//Method is used to add a new material, String is required as input
		//ID will be generated automatically 
		//Name of material is a required input
		//material table
		
		String sql="INSERT INTO material (Material_Name	) VALUES ('"+MaterialName+"');";
		getStmt().executeUpdate(sql);	
		System.out.println("Creation of material was successful..");
	}
	
}

package EmailSending;


import java.sql.SQLException;
import java.time.LocalDateTime;
import java.time.format.DateTimeFormatter;
import java.util.HashMap;
import java.util.Map;
import java.util.Map.Entry;

import Connection.DBproductAndCategory;

public class Report {
	
	DBproductAndCategory p ;
	
public Report() {
	p= new DBproductAndCategory();
}



	public String makeReport() throws SQLException {
		String report;
		
		   DateTimeFormatter dtf = DateTimeFormatter.ofPattern("yyyy/MM/dd HH:mm:ss");  
		   LocalDateTime now = LocalDateTime.now();  
		   
		   String reportSet="<body>";
		   String reportHeading="<h1>Report "+dtf.format(now)+"<br></h1>";
		   String reportMainBody =  makeListOfEndingProducts() + makeListOfProcessingOrders();
		   String reportSetEnd="</body>";
		   
		   report=reportSet+reportHeading+reportMainBody+reportSetEnd;
		return report;
	}
	
	private String makeListOfEndingProducts() throws SQLException{
		
		
		HashMap<String,Integer> records=
				p.listOfEndingProducts();
		String table ="<h2>Please pay attention to running out of products:</h2> <table> <tr> <th>Product ID</th> <th>Amount left</th> </tr>";
		
		if(records.size()==0) {return "";}
		
        for (Map.Entry<String, Integer> entry : records.entrySet()) {
            String key = entry.getKey();
            Integer value = entry.getValue();
           table=table+"<tr> <td>"+key+"</td> <td>"+value+"</td> </tr>";
        }
        
        table=table+"</table><br>";
        
		return table;
	}
	private String makeListOfProcessingOrders() throws SQLException{
		String table="<h2>Please, look into the Procesing orders:</h2> <table> <tr> <th>Order ID</th> <th>User ID</th> </tr>";
		HashMap<String,String> records=
				p.listOfProcessingOrders();
		
		if(records.size()==0) {return "";}
		
        for (Entry<String, String> entry : records.entrySet()) {
            String key = entry.getKey();
            String value = entry.getValue();
           table=table+"<tr> <td>"+key+"</td> <td>"+value+"</td> </tr>";
        }
        
        table=table+"</table><br>";
        
		return table;
		
	}
}

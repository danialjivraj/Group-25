package Connection;

import java.sql.SQLException;
import java.time.LocalDate;
import java.time.LocalDateTime;

import com.mysql.jdbc.PreparedStatement;

import java.sql.ResultSet;


public class DBorder extends DataBaseConn{
	
	public void changeStatusOfOrder(String ID, int Status) throws SQLException {
		// used to change status of the order 
		//requires id of order and
		//new status as an int (statusMaker)=> String
		
		String StatusSQL= statusMaker(Status);
		
		String sql= "UPDATE orderb "
				+ "SET Order_Status = '"+StatusSQL+"' "
				+ "WHERE Order_ID="+ID+";";
		
		getStmt().executeUpdate(sql);
		
		System.out.println("Change of status for order was successful..");
		
	}

	
	//Uses an int as status
	public String statusMaker(int Status) {
		
		//Used to set a status
		// 1 - Processing
		// 2 - Shipped
		// 3 - Delivered
		// 4 - Canceled
		
		String StatusSQL;
		
		switch(Status) {
		case 1:
			StatusSQL="Processing";
			break;
		case 2:
			StatusSQL="Shipped";
			break;
		case 3:
			StatusSQL="Delivered";
			break;
		case 4:
			StatusSQL="Canceled";
			break;
		default:
			throw new IllegalStateException("Unknown parameter for Status (1 for Processing or "
					+ "2 for Shipped or 3 for Delivered or 4 Canceled)");
		}
		
		return StatusSQL;
		
	}
	
	
	//Uses a String as status
	public int getStatus(String status) {
	    switch (status) {
	        case "Processing":
	            return 1;
	        case "Shipped":
	            return 2;
	        case "Delivered":
	            return 3;
	        case "Canceled":
	            return 4;
	        default:
	            throw new IllegalArgumentException("Invalid status: " + status);
	    }
	}

	
	public ResultSet getAllOrders() throws SQLException {
		String sql = "SELECT * FROM orderb WHERE Order_Status <> 'Basket'";
	    ResultSet rs = getStmt().executeQuery(sql);
	    return rs;
	}
	
	public ResultSet getOrderProductById(String ID) throws SQLException {
	  String sql = "SELECT * FROM linked_product_order WHERE Order_ID='"+ID+"'";
	  ResultSet rs = getStmt().executeQuery(sql);
	  return rs;
	}
	
//	public String getOrdersInAWeek() {
//	
//		LocalDateTime now = LocalDateTime.now();
//		//LocalDate startDate = now.toLocalDate().minusDays(7);
//	String sql= "SELECT created_at, Order_Total_Price FROM Orderb WHERE created_at BETWEEN"+now+ "AND" + startDate+ ";";
//	LocalDate startDate = LocalDate.now().minusWeeks(1);
//	PreparedStatement stmt = ("SELECT created_at, Order_Total_Price FROM Orderb WHERE created_at BETWEEN ? AND ?");
//	stmt.setDate(1, java.sql.Date.valueOf(startDate));
//	stmt.setDate(2, java.sql.Date.valueOf(LocalDate.now()));
//	.setStmt(stmt);
////		List<Pair<String, Double>> data = new ArrayList<>();
////		Map<String, Double> salesByDay = new HashMap<>();
////
////		while (rs.next()) {
////		    LocalDate createdDate = rs.getDate("created_at").toLocalDate();
////		    String dayOfWeek = createdDate.getDayOfWeek().toString();
////
////		    Double sales = salesByDay.getOrDefault(dayOfWeek, 0.0);
////		    salesByDay.put(dayOfWeek, sales + rs.getDouble("Order_Total_Price"));
////		}
////
////		for (DayOfWeek day : DayOfWeek.values()) {
////		    Double sales = salesByDay.getOrDefault(day.toString(), 0.0);
////		    data.add(new Pair<>(day.toString(), sales));
////		}
//	}
//	


	public static void main(String[] args) {
	}
}

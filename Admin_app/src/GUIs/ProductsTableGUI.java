package GUIs;

import javax.swing.*;
import javax.swing.border.EmptyBorder;
import javax.swing.table.DefaultTableModel;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.awt.event.MouseAdapter;
import java.awt.event.MouseEvent;
import java.io.IOException;
import java.net.URISyntaxException;

import javax.swing.table.TableRowSorter;
import javax.swing.table.DefaultTableCellRenderer;


import Connection.DBaccount;
import Connection.DBproductAndCategory;

import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;
import java.awt.BorderLayout;
import java.awt.Color;
import java.awt.Component;
import java.awt.FlowLayout;
import java.awt.Font;
import java.awt.Image;


public class ProductsTableGUI extends JFrame implements ActionListener{

    private JTable table;
    private DefaultTableModel model;
    private JPanel contentPane;
    private JTextField searchField;
    private JComboBox<String> filterBox;
    private JButton searchBtn;
    private JButton delButton;
    private JButton stkChckBtn;  //btn to check stock levels
    JLabel imageLabel, addProduct ;
    private JButton editProduct;
    private JTextField productFinder;

    public ProductsTableGUI() throws SQLException{
        setTitle("All Products");
        setIconImage(ImageIconMaker.createImageIcon());
        setDefaultCloseOperation(JFrame.DISPOSE_ON_CLOSE);
        setBounds(200, 200, 1400, 600);
        contentPane = new JPanel();
        contentPane.setBorder(new EmptyBorder(5, 5, 5, 5));
        contentPane.setLayout(new BorderLayout(0, 0));
        setContentPane(contentPane);

        // Create table model
        model = new DefaultTableModel(){
        	//makes cells uneditable
            @Override
            public boolean isCellEditable(int row, int column) {
                return false; // make all cells non-editable
            }
        };
        table = new JTable(model);

     // Increase font size for table
        Font tableFont = new Font(table.getFont().getName(), Font.PLAIN,15);
        table.setFont(tableFont);
        // Add columns to the table model
        model.addColumn("Product Image");
        model.addColumn("Product ID");
        model.addColumn("Category ID");
        model.addColumn("Product Name");
        model.addColumn("Product Price");
        model.addColumn("Stock");
        model.addColumn("In/Out of/Low Stock");
        model.addColumn("Description");


        // Add data to the table model (This Table uses Array instead of Vector)
        try {
        	DBproductAndCategory dba = new DBproductAndCategory();
            ResultSet rs = dba.getProducts();
            while (rs.next()) {
            	 int productID = rs.getInt("Product_ID");
            	    String imageFileName = productID + ".jpg";
            	    String imagePath = "..\\GoldenRiver-Laravel\\public\\images\\allProductImages\\" + imageFileName;
            	    
            	 // Load the original image from file
            	    ImageIcon originalIcon = new ImageIcon(imagePath);
            	    Image originalImage = originalIcon.getImage();

            	    int newWidth = 120; 
            	    int newHeight = 140; 
            	    Image scaledImage = originalImage.getScaledInstance(newWidth, newHeight, Image.SCALE_SMOOTH);

            	    // Create a new ImageIcon object from the scaled image
            	    ImageIcon scaledIcon = new ImageIcon(scaledImage);
            	     
            	String amount = rs.getString("Amount");
                Object[] row = new Object[]{
                		scaledIcon,
                		productID,
                        dba.getCategoryName(rs.getString("Category_ID")),
                        rs.getString("Product_Name"),
                        "\u00A3"+ rs.getString("Product_Price"),
                        amount,
                        amount.equals("0") ? "Out of Stock" : (Integer.parseInt(amount) < 4 ? "Low Stock" : "In Stock"),
                        rs.getString("Description")
                };
                model.addRow(row);
            }
        } catch (SQLException e) {
            e.printStackTrace();
        }

      //  table = new JTable(model);
        table.setSelectionMode(ListSelectionModel.SINGLE_SELECTION);
        table.getColumnModel().getColumn(0).setCellRenderer(new ImageRenderer());
        table.setDefaultRenderer(Object.class, new ProductGuiRowRenderer());

        
        JScrollPane scrollPane = new JScrollPane(table);
        //set height of rows
        table.setRowHeight(150);
        Font font = new Font("Calibri", Font.BOLD, 17);

        // set the font for the table
        table.setFont(font);
        //columns cannot be reordered
        table.getTableHeader().setReorderingAllowed(false);
        
        contentPane.add(scrollPane, BorderLayout.CENTER);

        // SEARCH PANEL
        JPanel searchPanel = new JPanel(new FlowLayout(FlowLayout.LEFT));
        JLabel searchLabel = new JLabel("Search by Product ID or Product Name: ");
        searchField = new JTextField(20);
        searchField.addActionListener(this);
        searchBtn = new JButton("Search");
        searchBtn.addActionListener(this);
    	
    	editProduct=new JButton("Edit a product");
    	
    	editProduct.addActionListener(this);
    	
    	productFinder = new JTextField(30);
    	//loginTx.setBounds(WIDTH/2,70,100,25);
    	
    	addProduct = new JLabel("<html><a href=\"#\">Add A New Product</a></html>");
    	addProduct.addMouseListener(new MouseAdapter() {
    	    @Override
    	    public void mouseClicked(MouseEvent e) {
    	    	try {
    				new AddProductGUI();
    			} catch (SQLException e1) {
    				e1.printStackTrace();
    			}
    	    }
    	});
        searchPanel.add(searchLabel);
        searchPanel.add(searchField);
        searchPanel.add(searchBtn);
        searchPanel.add(addProduct);
        searchPanel.add(editProduct);
        searchPanel.add(productFinder);
        
        JPanel addEditProdPanel = new JPanel(new FlowLayout(FlowLayout.RIGHT));
        addEditProdPanel.setBackground(Color.BLACK);
     
        JPanel filterPanel = new JPanel(new FlowLayout(FlowLayout.LEFT));
        JLabel filterLabel = new JLabel("Filter by Categories: ");
        String[] filterOptions = {"All", "Earrings", "Necklace", "Bracelets", "Rings", "Exclusive sets"};
        filterBox = new JComboBox<>(filterOptions);
        filterBox.addActionListener(this);
        
        stkChckBtn = new JButton("Quick Stock Check");
        stkChckBtn.addActionListener(this);
        
        filterPanel.add(filterLabel, BorderLayout.WEST);
        filterPanel.add(filterBox, BorderLayout.CENTER);
        filterPanel.add(stkChckBtn, BorderLayout.CENTER);

        JPanel searchFilterPanel = new JPanel(new BorderLayout());
        searchFilterPanel.add(searchPanel, BorderLayout.NORTH);
        searchFilterPanel.add(filterPanel, BorderLayout.CENTER);
        
        JLabel optionsLbl = new JLabel("Select a row and use the following option(s):  ");
     // create submit button for Changing order Status
        delButton = new JButton("Delete Product");
 		delButton.addActionListener(this);
 		
 		
        
        JPanel submitPanel = new JPanel(new FlowLayout(FlowLayout.RIGHT));
        submitPanel.add(optionsLbl);
        submitPanel.add(delButton);
        delButton.setBackground(new Color(0xF86161)); //color Red


        // add searchFilterPanel and submitPanel to contentPane
        contentPane.add(searchFilterPanel, BorderLayout.NORTH);
        contentPane.add(submitPanel, BorderLayout.SOUTH);
        

        setVisible(true);
    }
    
    public static void main(String[] args) throws SQLException {
		new ProductsTableGUI();
	}

	@Override
	public void actionPerformed(ActionEvent e) {
		
		if (e.getSource() == searchField || e.getSource() == filterBox) {
    		filterTable();
    		} else if (e.getSource() == searchBtn) {
    		filterTable();
    		}
    		else if (e.getSource() == delButton) {
    			 int selectedRow = table.getSelectedRow();
    			 if (selectedRow == -1) { //if No show is selected and submitButton2 is pressed it is gonna show an error
		            JOptionPane.showMessageDialog(this, "Please select a row to Delete.");
    			 }else {
			        	String prodID = model.getValueAt(selectedRow, 1).toString();  //maybe Change this later as Product Image is now first column
			            int option = JOptionPane.showConfirmDialog(this, "Are you sure you want to delete this Product? \nProductID:" + prodID);
			            	
	        	//Give pop up saying are you sure you want to remove this product if yes then delete it
			            if (option == JOptionPane.YES_OPTION) {
    			DBproductAndCategory db = new DBproductAndCategory();
    			try {
					db.delProduct(prodID);
					model.removeRow(selectedRow);
				} catch (SQLException e1) {
					// TODO Auto-generated catch block
					e1.printStackTrace();
				}
            }
		}
	 }else if(e.getSource() == stkChckBtn) {
		 StockAlertGUI sAlert = new StockAlertGUI();
			try {
				
				sAlert.displayStockAlerts();
				sAlert.allInStckAlert();
			} catch (SQLException e1) {
				e1.printStackTrace();
			}
	 }else if(e.getSource()==editProduct) {
			try {
				new EditProductGUI(productFinder.getText());
			} catch (SQLException e1) {
				// TODO Auto-generated catch block
				e1.printStackTrace();
			}
		}
}
	

	private void filterTable() {
	     // Get the search query and filter option from the GUI elements
        String searchQuery = searchField.getText().trim();
        String filterOption = (String) filterBox.getSelectedItem();

        // Create a TableRowSorter for the JTable
        TableRowSorter<DefaultTableModel> sorter = new TableRowSorter<DefaultTableModel>(model);
        table.setRowSorter(sorter);

        // Set up the filter
        ArrayList<RowFilter<Object, Object>> filters = new ArrayList<RowFilter<Object, Object>>();
        filters.add(RowFilter.regexFilter("(?i)" + searchQuery, 1, 3)); 

        if (!filterOption.equals("All")) {
            // Create a filter for the selected Order Status
            RowFilter<Object, Object> statusFilter = RowFilter.regexFilter("^" + filterOption + "$", 2);
            filters.add(statusFilter);
        }

        // Apply the filters to the TableRowSorter
        sorter.setRowFilter(RowFilter.andFilter(filters));
		
	}
	
}
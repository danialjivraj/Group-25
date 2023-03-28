package GUIs;

import java.awt.Color;
import java.awt.Component;

import javax.swing.JLabel;
import javax.swing.JTable;
import javax.swing.table.DefaultTableCellRenderer;
import javax.swing.table.TableModel;

class ProductGuiRowRenderer extends DefaultTableCellRenderer {
    public Component getTableCellRendererComponent(JTable table, Object value, boolean isSelected, boolean hasFocus, int row, int column) {
        Component c = super.getTableCellRendererComponent(table, value, isSelected, hasFocus, row, column);
        // Get the model for the table
        TableModel model = table.getModel();

        // Get the value for the "stockStatus" column for this row
        String stockStatus = (String) model.getValueAt(row, 6);

        
        if (isSelected) {
            c.setBackground(new Color(0x90D7E8)); // Light blue color code
        }
        else if (stockStatus.equals("Out of Stock")) {
            c.setBackground(new Color(0xC96666));
        } else if (stockStatus.equals("Low Stock")) {
            c.setBackground(new Color(0xCFCD4A));
        } else {
            c.setBackground(table.getBackground());
        }
        ((JLabel) c).setHorizontalAlignment(JLabel.CENTER);
        return c;
    }
}


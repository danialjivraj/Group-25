package GUIs;

import javax.swing.table.DefaultTableCellRenderer;

import java.awt.Component;

import javax.swing.ImageIcon;
import javax.swing.JLabel;
import javax.swing.JTable;

public class ImageRenderer extends DefaultTableCellRenderer {
 
    @Override
    public Component getTableCellRendererComponent(JTable table, Object value, boolean isSelected, boolean hasFocus, int row, int column) {
    	JLabel label = new JLabel();
        if (value instanceof ImageIcon) {
            label.setIcon((ImageIcon)value);
            label.setHorizontalAlignment(JLabel.CENTER);
            label.setVerticalAlignment(JLabel.CENTER);
        }
        return label;
    }
}

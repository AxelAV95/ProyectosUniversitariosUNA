/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package proyectoed1.vista;

import java.awt.Component;
import java.awt.Image;
import java.io.IOException;
import java.util.logging.Level;
import java.util.logging.Logger;
import javax.swing.ImageIcon;
import javax.swing.JButton;
import javax.swing.JCheckBox;
import javax.swing.JLabel;
import javax.swing.JOptionPane;
import javax.swing.JTable;
import javax.swing.UIManager;
import javax.swing.table.DefaultTableCellRenderer;
import javax.swing.table.DefaultTableModel;
import proyectoed1.controlador.ControladorHabitacion;
import proyectoed1.modelo.datos.Datos;
import proyectoed1.modelo.datos.Globales;
import proyectoed1.modelo.dominio.Habitacion;
import proyectoed1.modelo.dominio.NodoHabitacion;
import proyectoed1.vista.GUIAgregarHabitacion;
import proyectoed1.vista.GUIConsultarHabitacion;
import proyectoed1.vista.GUIModificarHabitacion;

/**
 *
 * @author adeve
 */
public class GUIHabitaciones extends javax.swing.JFrame {

    private String[] columns = new String[5];
    private Object[][] data = new Object[3][4];
     Tabla t = new Tabla();
     private DefaultTableModel d;
      
    

    public DefaultTableModel getD() {
        return d;
    }

    public class Render extends DefaultTableCellRenderer {

        @Override
        public Component getTableCellRendererComponent(JTable table, Object value,
                boolean isSelected, boolean hasFocus, int row, int column) {

            if (value instanceof JButton) {
                JButton btn = (JButton) value;
                if (isSelected) {
                    btn.setForeground(table.getSelectionForeground());
                    btn.setBackground(table.getSelectionBackground());
                } else {
                    btn.setForeground(table.getForeground());
                    btn.setBackground(UIManager.getColor("Button.background"));
                }
                return btn;
            }

            if (value instanceof JCheckBox) {
                JCheckBox ch = (JCheckBox) value;
                return ch;
            }

            return super.getTableCellRendererComponent(table, value, isSelected,
                    hasFocus, row, column); //To change body of generated methods, choose Tools | Templates.
        }

    }

    public class Tabla {

        public void ver_tabla(JTable tabla) {

            tabla.setDefaultRenderer(Object.class, new Render());

            JButton btn1 = new JButton("Modificar");
            btn1.setName("m");
            JButton btn2 = new JButton("Eliminar");
            btn2.setName("e");

            columns = new String[]{"Num.Habitacion", "Descripción", "Precio", "Cantidad", "M", "E"};
            data = new Object[][]{
                {"", "", "", "", btn1, btn2},
                {"", "", "", "", btn1, btn2},
                {"", "", "", "", btn1, btn2}
            };
            /*NodoHabitacion aux = Datos.getListaHabitaciones().getPrimero();
            while(aux.getSiguiente() != Datos.getListaHabitaciones().getPrimero()){
                model
            }*/
            d = new DefaultTableModel(columns, 0) {
                public boolean isCellEditable(int row, int column) {
                    return false;
                }
            };
            
            NodoHabitacion aux = Datos.getListaHabitaciones().getPrimero();
            while(aux.getSiguiente() != Datos.getListaHabitaciones().getPrimero()){
                Object[] data = {
                    aux.getHabitacion().getNumHabitacion(), aux.getHabitacion().getDescripcion(), Math.round( aux.getHabitacion().getPrecio()),aux.getHabitacion().getCantidadPersonas(),btn1,btn2
                };
                d.addRow(data);
                
                aux = aux.getSiguiente();
            }
            Object[] data = {
                    aux.getHabitacion().getNumHabitacion(), aux.getHabitacion().getDescripcion(), Math.round( aux.getHabitacion().getPrecio()),aux.getHabitacion().getCantidadPersonas(),btn1,btn2
                };
                d.addRow(data);
            tabla.setModel(d);
            tabla.setRowHeight(30);
            tabla.setCellSelectionEnabled(false);
            tabla.setPreferredScrollableViewportSize(tabla.getPreferredSize());

        }
    }

    public GUIHabitaciones() {
       
        Datos.iniciarListaHabitaciones();
        Datos.iniciarListaExtras();
        this.setContentPane(new JLabel(new ImageIcon(new ImageIcon(Globales.rutaGeneral+"\\src\\proyectoed1\\vista\\icons\\wall1.jpg").getImage().getScaledInstance(687, 496, Image.SCALE_DEFAULT))));
        initComponents();
        this.setLocationRelativeTo(null);
         t.ver_tabla(tablaHabitaciones);
    }

    /**
     * This method is called from within the constructor to initialize the form.
     * WARNING: Do NOT modify this code. The content of this method is always
     * regenerated by the Form Editor.
     */
    @SuppressWarnings("unchecked")
    // <editor-fold defaultstate="collapsed" desc="Generated Code">//GEN-BEGIN:initComponents
    private void initComponents() {

        jScrollPane1 = new javax.swing.JScrollPane();
        tablaHabitaciones = new javax.swing.JTable();
        agregarHabitacion = new javax.swing.JButton();
        consultarHabitacion = new javax.swing.JButton();

        setDefaultCloseOperation(javax.swing.WindowConstants.DISPOSE_ON_CLOSE);
        setTitle("Gestionar habitaciones");
        setResizable(false);

        tablaHabitaciones.setModel(new javax.swing.table.DefaultTableModel(
            new Object [][] {
                {null, null, null, null},
                {null, null, null, null},
                {null, null, null, null},
                {null, null, null, null}
            },
            new String [] {
                "Title 1", "Title 2", "Title 3", "Title 4"
            }
        ));
        tablaHabitaciones.addMouseListener(new java.awt.event.MouseAdapter() {
            public void mouseClicked(java.awt.event.MouseEvent evt) {
                tablaHabitacionesMouseClicked(evt);
            }
        });
        jScrollPane1.setViewportView(tablaHabitaciones);

        agregarHabitacion.setText("Agregar");
        agregarHabitacion.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                agregarHabitacionActionPerformed(evt);
            }
        });

        consultarHabitacion.setText("Consultar");
        consultarHabitacion.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                consultarHabitacionActionPerformed(evt);
            }
        });

        javax.swing.GroupLayout layout = new javax.swing.GroupLayout(getContentPane());
        getContentPane().setLayout(layout);
        layout.setHorizontalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(layout.createSequentialGroup()
                .addGap(33, 33, 33)
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addGroup(layout.createSequentialGroup()
                        .addComponent(agregarHabitacion, javax.swing.GroupLayout.PREFERRED_SIZE, 113, javax.swing.GroupLayout.PREFERRED_SIZE)
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                        .addComponent(consultarHabitacion, javax.swing.GroupLayout.PREFERRED_SIZE, 113, javax.swing.GroupLayout.PREFERRED_SIZE))
                    .addComponent(jScrollPane1, javax.swing.GroupLayout.PREFERRED_SIZE, 624, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addContainerGap(30, Short.MAX_VALUE))
        );
        layout.setVerticalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(layout.createSequentialGroup()
                .addGap(23, 23, 23)
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(agregarHabitacion)
                    .addComponent(consultarHabitacion, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE))
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED, 28, Short.MAX_VALUE)
                .addComponent(jScrollPane1, javax.swing.GroupLayout.PREFERRED_SIZE, 399, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addGap(23, 23, 23))
        );

        pack();
    }// </editor-fold>//GEN-END:initComponents

    private void tablaHabitacionesMouseClicked(java.awt.event.MouseEvent evt) {//GEN-FIRST:event_tablaHabitacionesMouseClicked
        // TODO add your handling code here:
        int column = tablaHabitaciones.getColumnModel().getColumnIndexAtX(evt.getX());
        int row = evt.getY() / tablaHabitaciones.getRowHeight();

        if (row < tablaHabitaciones.getRowCount() && row >= 0 && column < tablaHabitaciones.getColumnCount() && column >= 0) {
            Object value = tablaHabitaciones.getValueAt(row, column);
            if (value instanceof JButton) {
                ((JButton) value).doClick();
                JButton boton = (JButton) value;

                if (boton.getName().equals("m")) {
                    System.out.println("Click en el boton modificar");
                    //EVENTOS MODIFICAR
                    int column1 = 0;
                    int row1 = tablaHabitaciones.getSelectedRow();
                    String value1 = tablaHabitaciones.getModel().getValueAt(row1, column1).toString();
                   // JOptionPane.showMessageDialog(null, value1);
                 //  this.dispose();
                    this.dispose();
                    new GUIModificarHabitacion(value1).setVisible(true);
                   // new recibeinfo(value1).setVisible(true);
                }
                if (boton.getName().equals("e")) {
                   int decision = JOptionPane.showConfirmDialog(null, "Desea eliminar este registro", "Confirmar", JOptionPane.OK_CANCEL_OPTION);
                    
                   if(decision == 0){
                       int column1 = 0;
                    int row1 = tablaHabitaciones.getSelectedRow();
                    String value1 = tablaHabitaciones.getModel().getValueAt(row1, column1).toString();  
                       ControladorHabitacion ch = new ControladorHabitacion();
                         
                         Habitacion h = new Habitacion();
                         h.setNumHabitacion(Integer.parseInt(value1));
                         
                       try {
                           if(ch.eliminar(Datos.getListaHabitaciones(), h) == true && ch.eliminarArchivo("habitaciones.txt", h) == true){
                               JOptionPane.showMessageDialog(null, "Eliminado con éxito.");
                               this.dispose();
                               Datos.resetearListaHabitaciones();
                               Datos.iniciarListaHabitaciones();
                    new GUIHabitaciones().setVisible(true);
                           }else{
                               JOptionPane.showMessageDialog(null, "Error al eliminar.");
                           }
                           // ch.eliminar(Datos.getListaHabitaciones(), h);
                           //JOptionPane.showMessageDialog(null, h.getNumHabitacion());
                       } catch (IOException ex) {
                           Logger.getLogger(GUIHabitaciones.class.getName()).log(Level.SEVERE, null, ex);
                       }
                         
                   }else{
                         JOptionPane.showMessageDialog(null, "Cancelado");
                   }
                    //System.out.println(decision);
                    
                    //EVENTOS ELIMINAR
                }
            }
            if (value instanceof JCheckBox) {
                //((JCheckBox)value).doClick();
                JCheckBox ch = (JCheckBox) value;
                if (ch.isSelected() == true) {
                    ch.setSelected(false);
                }
                if (ch.isSelected() == false) {
                    ch.setSelected(true);
                }

            }
        }
    }//GEN-LAST:event_tablaHabitacionesMouseClicked

    private void consultarHabitacionActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_consultarHabitacionActionPerformed
        // TODO add your handling code here:
        new GUIConsultarHabitacion().setVisible(true);
    }//GEN-LAST:event_consultarHabitacionActionPerformed

    private void agregarHabitacionActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_agregarHabitacionActionPerformed
        // TODO add your handling code here:
        new GUIAgregarHabitacion().setVisible(true);
        this.dispose();
    }//GEN-LAST:event_agregarHabitacionActionPerformed

    /**
     * @param args the command line arguments
     */
    public static void main(String args[]) {
        /* Set the Nimbus look and feel */
        //<editor-fold defaultstate="collapsed" desc=" Look and feel setting code (optional) ">
        /* If Nimbus (introduced in Java SE 6) is not available, stay with the default look and feel.
         * For details see http://download.oracle.com/javase/tutorial/uiswing/lookandfeel/plaf.html 
         */
        try {
            for (javax.swing.UIManager.LookAndFeelInfo info : javax.swing.UIManager.getInstalledLookAndFeels()) {
                if ("Nimbus".equals(info.getName())) {
                    javax.swing.UIManager.setLookAndFeel(info.getClassName());
                    break;
                }
            }
        } catch (ClassNotFoundException ex) {
            java.util.logging.Logger.getLogger(GUIHabitaciones.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (InstantiationException ex) {
            java.util.logging.Logger.getLogger(GUIHabitaciones.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (IllegalAccessException ex) {
            java.util.logging.Logger.getLogger(GUIHabitaciones.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (javax.swing.UnsupportedLookAndFeelException ex) {
            java.util.logging.Logger.getLogger(GUIHabitaciones.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        }
        //</editor-fold>

        /* Create and display the form */
        java.awt.EventQueue.invokeLater(new Runnable() {
            public void run() {
                new GUIHabitaciones().setVisible(true);
            }
        });
    }

    // Variables declaration - do not modify//GEN-BEGIN:variables
    private javax.swing.JButton agregarHabitacion;
    private javax.swing.JButton consultarHabitacion;
    private javax.swing.JScrollPane jScrollPane1;
    private javax.swing.JTable tablaHabitaciones;
    // End of variables declaration//GEN-END:variables
}

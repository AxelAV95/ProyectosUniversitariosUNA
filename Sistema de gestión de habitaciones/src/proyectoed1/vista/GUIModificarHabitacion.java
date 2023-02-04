/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package proyectoed1.vista;

import Atxy2k.CustomTextField.RestrictedTextField;
import java.awt.Dimension;
import java.awt.GridLayout;
import java.awt.Image;
import java.io.File;
import java.io.IOException;
import java.util.Arrays;
import java.util.logging.Level;
import java.util.logging.Logger;
import javax.swing.ImageIcon;
import javax.swing.JFileChooser;
import javax.swing.JLabel;
import javax.swing.JOptionPane;
import javax.swing.JTable;
import javax.swing.table.DefaultTableModel;
import proyectoed1.modelo.datos.Datos;
import proyectoed1.modelo.datos.Globales;
import proyectoed1.modelo.dominio.Extra;
import proyectoed1.modelo.dominio.Habitacion;
import proyectoed1.modelo.dominio.ListaExtra;
import proyectoed1.modelo.dominio.NodoExtra;
import proyectoed1.modelo.negocio.LogicaHabitacion;

/**
 *
 * @author adeve
 */
public class GUIModificarHabitacion extends javax.swing.JFrame {

    private String habitacionID;
    private static int contador = 0;
    private static boolean reinicio = false;
    private static boolean modificarImg = false;
    private String[] imagenesNombre;
    private File[] imagenes;
    private File[] aux;

    private DefaultTableModel modeloExtras = new DefaultTableModel(Globales.columnasExtrasSeleccionadas, 0);

    ;
    /**
     * Creates new form GUIModificarHabitacion
     */
    public GUIModificarHabitacion(String ID) {
         Datos.iniciarListaHabitaciones();
         Datos.iniciarListaExtras();
        this.habitacionID = ID;
        this.setContentPane(new JLabel(new ImageIcon(new ImageIcon(Globales.rutaGeneral + "\\src\\proyectoed1\\vista\\icons\\wall1.jpg").getImage().getScaledInstance(971, 617, Image.SCALE_DEFAULT))));
        initComponents();
        GridLayout grid = new GridLayout(0, 5);
        grid.setHgap(30);
        panelImagenes.setLayout(grid);
        panelImagenes.setPreferredSize(new Dimension(825, 186));//[825, 186]
        cargarComboExtras();
        restringirCampos();
        tablaExtrasHab1.setModel(modeloExtras);

        habitacionid.setVisible(false);
        
        Habitacion h = Globales.controladorHabitacion.obtenerHabitacion(Integer.parseInt(habitacionID), Datos.getListaHabitaciones());
        campoDescripcion.setText(h.getDescripcion());
        campoPrecio.setText(String.valueOf(Math.round(h.getPrecio())));
        campoPersonas.setText(String.valueOf(h.getCantidadPersonas()));

        NodoExtra auxE = h.getListaExtras().getPrimero();
        DefaultTableModel model = (DefaultTableModel) tablaExtrasHab1.getModel();
        while (auxE != null) {
            Object[] data = {
                auxE.getExtra().getCodigo() + "-" + auxE.getExtra().getDescripcion()
            };
            model.addRow(data);
            auxE = auxE.getSiguiente();
        }

        for (String s : h.getImagenesNombres()) {

            JLabel jlabelpic = new JLabel(new ImageIcon(new ImageIcon(Globales.rutaGeneral + "\\img\\habitaciones\\" + s).getImage().getScaledInstance(150, 150, Image.SCALE_DEFAULT)));
            panelImagenes.add(jlabelpic);
            //i++;
        }
        imagenesNombre = h.getImagenesNombres();
        aux = new File[0];
        imagenes = new File[imagenesNombre.length];
        int i = 0;
        for (String s : imagenesNombre) {
            imagenes[i] = new File(Globales.rutaGeneral + "\\img\\habitaciones\\" + s);
            i++;
            contador++;
        }

        for (File f : imagenes) {
            System.out.print(f.getName());
        }
       
        
        revalidate();
        repaint();
        
        

    }
    
    public void restringirCampos(){
        RestrictedTextField campoDesc = new RestrictedTextField(campoDescripcion);
        RestrictedTextField campoPrec = new RestrictedTextField(campoPrecio);
        RestrictedTextField campoPerson = new RestrictedTextField(campoPersonas);
    
        
        
        campoPrec.setOnlyNums(true);
        campoPerson.setOnlyNums(true);
        
    }
    
    public void cargarComboExtras() {

        NodoExtra ne = Datos.getListaExtras().getPrimero();
        while (ne != null) {
            comboExtras1.addItem(ne.getExtra().getCodigo() + "-" + ne.getExtra().getDescripcion());
            ne = ne.getSiguiente();
        }

    }

    public boolean verificarExtras(String itemCombo) {
        Object[] columnData = new Object[tablaExtrasHab1.getRowCount()];
        Object[] rowData = new Object[tablaExtrasHab1.getRowCount()];
        for (int i = 0; i < tablaExtrasHab1.getRowCount(); i++) {

            if (itemCombo.equals(tablaExtrasHab1.getValueAt(i, 0))) {
                return true;
            }

        }

        return false;
    }

    /**
     * This method is called from within the constructor to initialize the form.
     * WARNING: Do NOT modify this code. The content of this method is always
     * regenerated by the Form Editor.
     */
    @SuppressWarnings("unchecked")
    // <editor-fold defaultstate="collapsed" desc="Generated Code">//GEN-BEGIN:initComponents
    private void initComponents() {

        jPanel1 = new javax.swing.JPanel();
        jLabel1 = new javax.swing.JLabel();
        jLabel2 = new javax.swing.JLabel();
        jLabel3 = new javax.swing.JLabel();
        campoDescripcion = new javax.swing.JTextField();
        campoPrecio = new javax.swing.JTextField();
        campoPersonas = new javax.swing.JTextField();
        jPanel3 = new javax.swing.JPanel();
        comboExtras1 = new javax.swing.JComboBox<String>();
        agregarExtra1 = new javax.swing.JButton();
        jScrollPane2 = new javax.swing.JScrollPane();
        tablaExtrasHab1 = new javax.swing.JTable();
        jButton2 = new javax.swing.JButton();
        jPanel4 = new javax.swing.JPanel();
        jPanel5 = new javax.swing.JPanel();
        jLabel4 = new javax.swing.JLabel();
        seleccionarImgBoton = new javax.swing.JButton();
        eliminarImagenesBoton = new javax.swing.JButton();
        panelImagenes = new javax.swing.JPanel();
        agregarHabitacion = new javax.swing.JButton();
        habitacionid = new javax.swing.JLabel();

        setDefaultCloseOperation(javax.swing.WindowConstants.DISPOSE_ON_CLOSE);
        setTitle("Modificar habitación");
        setResizable(false);

        jPanel1.setBorder(javax.swing.BorderFactory.createEtchedBorder());
        jPanel1.setOpaque(false);

        jLabel1.setText("<html> <body> <b style =\"color:white;\"> Descripción: </b></body><html>");

        jLabel2.setText("<html> <body> <b style =\"color:white;\"> Precio: </b></body><html>");

        jLabel3.setText("<html> <body> <b style =\"color:white;\"> Personas: </b></body><html>");

        javax.swing.GroupLayout jPanel1Layout = new javax.swing.GroupLayout(jPanel1);
        jPanel1.setLayout(jPanel1Layout);
        jPanel1Layout.setHorizontalGroup(
            jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(jPanel1Layout.createSequentialGroup()
                .addGap(22, 22, 22)
                .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addComponent(jLabel1, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(jLabel2, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(jLabel3, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addGap(18, 18, 18)
                .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING, false)
                    .addComponent(campoPersonas, javax.swing.GroupLayout.DEFAULT_SIZE, 135, Short.MAX_VALUE)
                    .addComponent(campoPrecio, javax.swing.GroupLayout.DEFAULT_SIZE, 135, Short.MAX_VALUE)
                    .addComponent(campoDescripcion))
                .addContainerGap(24, Short.MAX_VALUE))
        );
        jPanel1Layout.setVerticalGroup(
            jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(jPanel1Layout.createSequentialGroup()
                .addGap(16, 16, 16)
                .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(jLabel1, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(campoDescripcion, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addGap(20, 20, 20)
                .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(jLabel2, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(campoPrecio, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addGap(20, 20, 20)
                .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(jLabel3, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(campoPersonas, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addContainerGap(95, Short.MAX_VALUE))
        );

        jPanel3.setBorder(javax.swing.BorderFactory.createEtchedBorder());

        agregarExtra1.setText("+");
        agregarExtra1.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                agregarExtra1ActionPerformed(evt);
            }
        });

        tablaExtrasHab1.setModel(new javax.swing.table.DefaultTableModel(
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
        jScrollPane2.setViewportView(tablaExtrasHab1);

        jButton2.setText("-");
        jButton2.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jButton2ActionPerformed(evt);
            }
        });

        javax.swing.GroupLayout jPanel3Layout = new javax.swing.GroupLayout(jPanel3);
        jPanel3.setLayout(jPanel3Layout);
        jPanel3Layout.setHorizontalGroup(
            jPanel3Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(jPanel3Layout.createSequentialGroup()
                .addContainerGap()
                .addGroup(jPanel3Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING, false)
                    .addGroup(jPanel3Layout.createSequentialGroup()
                        .addComponent(comboExtras1, javax.swing.GroupLayout.PREFERRED_SIZE, 157, javax.swing.GroupLayout.PREFERRED_SIZE)
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                        .addComponent(agregarExtra1)
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                        .addComponent(jButton2, javax.swing.GroupLayout.PREFERRED_SIZE, 36, javax.swing.GroupLayout.PREFERRED_SIZE))
                    .addComponent(jScrollPane2, javax.swing.GroupLayout.PREFERRED_SIZE, 250, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addContainerGap(14, Short.MAX_VALUE))
        );
        jPanel3Layout.setVerticalGroup(
            jPanel3Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(jPanel3Layout.createSequentialGroup()
                .addContainerGap()
                .addGroup(jPanel3Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(comboExtras1, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(agregarExtra1)
                    .addComponent(jButton2))
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                .addComponent(jScrollPane2, javax.swing.GroupLayout.PREFERRED_SIZE, 127, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addContainerGap(javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE))
        );

        jPanel4.setBorder(javax.swing.BorderFactory.createEtchedBorder());
        jPanel4.setPreferredSize(new java.awt.Dimension(903, 268));

        jLabel4.setText("Seleccionar imágenes (Max 5):");

        seleccionarImgBoton.setText("Seleccionar...");
        seleccionarImgBoton.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                seleccionarImgBotonActionPerformed(evt);
            }
        });

        eliminarImagenesBoton.setText("Vaciar");
        eliminarImagenesBoton.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                eliminarImagenesBotonActionPerformed(evt);
            }
        });

        javax.swing.GroupLayout jPanel5Layout = new javax.swing.GroupLayout(jPanel5);
        jPanel5.setLayout(jPanel5Layout);
        jPanel5Layout.setHorizontalGroup(
            jPanel5Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(jPanel5Layout.createSequentialGroup()
                .addContainerGap()
                .addComponent(jLabel4)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                .addComponent(seleccionarImgBoton)
                .addGap(18, 18, 18)
                .addComponent(eliminarImagenesBoton)
                .addContainerGap(42, Short.MAX_VALUE))
        );
        jPanel5Layout.setVerticalGroup(
            jPanel5Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(javax.swing.GroupLayout.Alignment.TRAILING, jPanel5Layout.createSequentialGroup()
                .addContainerGap(13, Short.MAX_VALUE)
                .addGroup(jPanel5Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(jLabel4)
                    .addComponent(seleccionarImgBoton)
                    .addComponent(eliminarImagenesBoton))
                .addContainerGap())
        );

        panelImagenes.setPreferredSize(new java.awt.Dimension(845, 178));

        javax.swing.GroupLayout panelImagenesLayout = new javax.swing.GroupLayout(panelImagenes);
        panelImagenes.setLayout(panelImagenesLayout);
        panelImagenesLayout.setHorizontalGroup(
            panelImagenesLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGap(0, 845, Short.MAX_VALUE)
        );
        panelImagenesLayout.setVerticalGroup(
            panelImagenesLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGap(0, 178, Short.MAX_VALUE)
        );

        javax.swing.GroupLayout jPanel4Layout = new javax.swing.GroupLayout(jPanel4);
        jPanel4.setLayout(jPanel4Layout);
        jPanel4Layout.setHorizontalGroup(
            jPanel4Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(jPanel4Layout.createSequentialGroup()
                .addContainerGap()
                .addGroup(jPanel4Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addGroup(jPanel4Layout.createSequentialGroup()
                        .addGap(10, 10, 10)
                        .addComponent(panelImagenes, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
                    .addComponent(jPanel5, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addContainerGap(34, Short.MAX_VALUE))
        );
        jPanel4Layout.setVerticalGroup(
            jPanel4Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(jPanel4Layout.createSequentialGroup()
                .addContainerGap()
                .addComponent(jPanel5, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                .addComponent(panelImagenes, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addContainerGap(16, Short.MAX_VALUE))
        );

        agregarHabitacion.setText("Modificar");
        agregarHabitacion.setToolTipText("");
        agregarHabitacion.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                agregarHabitacionActionPerformed(evt);
            }
        });

        habitacionid.setEnabled(false);

        javax.swing.GroupLayout layout = new javax.swing.GroupLayout(getContentPane());
        getContentPane().setLayout(layout);
        layout.setHorizontalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(javax.swing.GroupLayout.Alignment.TRAILING, layout.createSequentialGroup()
                .addContainerGap(javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                .addComponent(agregarHabitacion)
                .addGap(43, 43, 43))
            .addGroup(layout.createSequentialGroup()
                .addContainerGap(31, Short.MAX_VALUE)
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addGroup(layout.createSequentialGroup()
                        .addComponent(jPanel4, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                        .addGap(0, 0, Short.MAX_VALUE))
                    .addGroup(layout.createSequentialGroup()
                        .addComponent(jPanel1, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                        .addGap(185, 185, 185)
                        .addComponent(habitacionid)
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                        .addComponent(jPanel3, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)))
                .addGap(36, 36, 36))
        );
        layout.setVerticalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(javax.swing.GroupLayout.Alignment.TRAILING, layout.createSequentialGroup()
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addGroup(layout.createSequentialGroup()
                        .addGap(32, 32, 32)
                        .addComponent(habitacionid)
                        .addGap(0, 0, Short.MAX_VALUE))
                    .addGroup(layout.createSequentialGroup()
                        .addGap(19, 19, 19)
                        .addComponent(jPanel1, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE))
                    .addGroup(javax.swing.GroupLayout.Alignment.TRAILING, layout.createSequentialGroup()
                        .addContainerGap()
                        .addComponent(jPanel3, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)))
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                .addComponent(jPanel4, javax.swing.GroupLayout.PREFERRED_SIZE, 262, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addGap(11, 11, 11)
                .addComponent(agregarHabitacion)
                .addGap(14, 14, 14))
        );

        pack();
        setLocationRelativeTo(null);
    }// </editor-fold>//GEN-END:initComponents

    private void agregarExtra1ActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_agregarExtra1ActionPerformed
        // TODO add your handling code here:
        if (verificarExtras(comboExtras1.getSelectedItem().toString()) == true) {
            JOptionPane.showMessageDialog(null, "Ya se agregó");
        } else {
            modeloExtras.addRow(new Object[]{comboExtras1.getSelectedItem()});
        }
    }//GEN-LAST:event_agregarExtra1ActionPerformed

    public static boolean verificarTablaVacia(JTable jTable) {
        if (jTable != null && jTable.getModel() != null) {
            return jTable.getModel().getRowCount() <= 0 ? true : false;
        }
        return false;
    }

    public boolean validarCampos() {
        if (campoDescripcion.getText().equals("") || campoPrecio.getText().equals("") || campoPersonas.getText().equals("") || verificarTablaVacia(tablaExtrasHab1) == true) {
            return true;
        }
        return false;
    }


    private void agregarHabitacionActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_agregarHabitacionActionPerformed
        // TODO add your handling code here:
        if (validarCampos() == true) {
            JOptionPane.showMessageDialog(null, "Debe llenar los campos correspondientes.");
        } else {
            Habitacion h = new Habitacion();

           
            ListaExtra le = new ListaExtra();

            LogicaHabitacion lh = new LogicaHabitacion();
            h.setNumHabitacion(Integer.parseInt(habitacionID));
            h.setDescripcion(campoDescripcion.getText());
            h.setPrecio(Double.parseDouble(campoPrecio.getText()));
            h.setCantidadPersonas(Integer.parseInt(campoPersonas.getText()));

            Object[] columnData = new Object[tablaExtrasHab1.getRowCount()];
            Object[] rowData = new Object[tablaExtrasHab1.getRowCount()];
            for (int i = 0; i < tablaExtrasHab1.getRowCount(); i++) {
                Extra e = new Extra();
                String[] splitfila
                        = tablaExtrasHab1.getValueAt(i, 0).toString().split("-");

                e.setCodigo(splitfila[0]);
                e.setDescripcion(splitfila[1]);
                Globales.controladorExtra.agregar(le, e);
            }
            h.setListaExtras(le);
            //  System.out.print(contador+"\n");
            // imagenes= Arrays.copyOf(imagenes, aux.length);
//            System.out.print("Aux " + aux.length);
  //          System.out.print("Antes " + imagenes.length);
            if (reinicio == true) {
                imagenes = Arrays.copyOf(imagenes, aux.length); //3
                System.arraycopy(aux, 0, imagenes, 0, aux.length);
            } else {
                imagenes = Arrays.copyOf(imagenes, aux.length + imagenes.length); //3
                System.arraycopy(aux, 0, imagenes, imagenesNombre.length, aux.length);
            }

            System.out.print("Despues " + imagenes.length);

            h.setImagenes(imagenes);

            for (File f : imagenes) {
                if (f == null) {
                    System.out.print("EMPTY" + "\n");
                } else {
                    System.out.print(f.getName() + "\n");
                }
//                System.out.print(f.getName()+"\n");
            }
            try {
                //&& ch.archivar("habitaciones.txt", h) == true

                if (reinicio == true) {
                    if (Globales.controladorHabitacion.actualizar(Datos.getListaHabitaciones(), h) == true && Globales.controladorHabitacion.modificarArchivo("habitaciones.txt", h) == true && Globales.controladorHabitacion.guardarImagenesModificarReinicio(aux, Globales.rutaGeneral, Integer.parseInt(habitacionID), 0)) {

                        JOptionPane.showMessageDialog(null, "Modificado con éxito.");
                        Datos.resetearListaHabitaciones();
                        Datos.iniciarListaHabitaciones();
                        this.dispose();

                        new GUIHabitaciones().setVisible(true);
                        contador = 0;
                    } else {
                        JOptionPane.showMessageDialog(null, "Error al modificar.");
                    }
                    reinicio = false;

                } else if (Globales.controladorHabitacion.actualizar(Datos.getListaHabitaciones(), h) == true && Globales.controladorHabitacion.modificarArchivo("habitaciones.txt", h) == true && Globales.controladorHabitacion.guardarImagenesModificar(aux, Globales.rutaGeneral, Integer.parseInt(habitacionID), contador)) {

                    JOptionPane.showMessageDialog(null, "Modificado con éxito.");
                    Datos.resetearListaHabitaciones();
                    Datos.iniciarListaHabitaciones();
                   
                    
                    contador = 0;
                    reinicio = false;
                     this.dispose();
                     new GUIHabitaciones().setVisible(true);
                } else {
                    JOptionPane.showMessageDialog(null, "Error al modificar.");
                }

            } catch (IOException ex) {
                Logger.getLogger(GUIModificarHabitacion.class.getName()).log(Level.SEVERE, null, ex);
            }

        }
    }//GEN-LAST:event_agregarHabitacionActionPerformed

    private void seleccionarImgBotonActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_seleccionarImgBotonActionPerformed
        // TODO add your handling code here:
       
       
        Globales.jc.setDialogTitle("Selecciona las imágenes..");
        Globales.jc.setMultiSelectionEnabled(true);

       
        
        if (Globales.jc.showOpenDialog(null) == JFileChooser.APPROVE_OPTION) {
            aux = Globales.jc.getSelectedFiles();
           

            if (aux.length + contador > 5) {
                JOptionPane.showMessageDialog(null, "No se puede agregar más de 5 imágenes.");
                aux = null;
            } else {
                for (File imagen : aux) {

                    JLabel jlabelpic = new JLabel(new ImageIcon(new ImageIcon(imagen.getAbsolutePath()).getImage().getScaledInstance(150, 150, Image.SCALE_DEFAULT)));
                    System.out.print(imagen.getAbsolutePath() + "\n");
                    System.out.print(aux.length + "\n");
                    

                    panelImagenes.add(jlabelpic);
                    contador++;

                    if (contador > 5) {
                        seleccionarImgBoton.setEnabled(false);

                        aux = null;
                        contador = 0;
                    }
                    System.out.print(imagen.getName() + "\n");

                  
                }

                revalidate();
                repaint();
            }
        }
    }//GEN-LAST:event_seleccionarImgBotonActionPerformed

    private void eliminarImagenesBotonActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_eliminarImagenesBotonActionPerformed
       
        panelImagenes.removeAll();
        seleccionarImgBoton.setEnabled(true);
        contador = 0;
        aux = null;
        reinicio = true;
        imagenes = new File[imagenesNombre.length];

        revalidate();
        repaint();
    }//GEN-LAST:event_eliminarImagenesBotonActionPerformed

    private void jButton2ActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jButton2ActionPerformed
        // TODO add your handling code here:
        DefaultTableModel model = (DefaultTableModel) tablaExtrasHab1.getModel();
        if (tablaExtrasHab1.getSelectedRow() != -1) {
            model.removeRow(tablaExtrasHab1.getSelectedRow());
        }
    }//GEN-LAST:event_jButton2ActionPerformed

    public void limpiarCampos() {
        campoDescripcion.setText("");
        campoPrecio.setText("");
        campoPersonas.setText("");
        modeloExtras.setRowCount(0);
    }

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
            java.util.logging.Logger.getLogger(GUIModificarHabitacion.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (InstantiationException ex) {
            java.util.logging.Logger.getLogger(GUIModificarHabitacion.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (IllegalAccessException ex) {
            java.util.logging.Logger.getLogger(GUIModificarHabitacion.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (javax.swing.UnsupportedLookAndFeelException ex) {
            java.util.logging.Logger.getLogger(GUIModificarHabitacion.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        }
        //</editor-fold>

        /* Create and display the form */
        java.awt.EventQueue.invokeLater(new Runnable() {
            public void run() {
                // new GUIModificarHabitacion().setVisible(true);
            }
        });
    }

    // Variables declaration - do not modify//GEN-BEGIN:variables
    private javax.swing.JButton agregarExtra1;
    private javax.swing.JButton agregarHabitacion;
    private javax.swing.JTextField campoDescripcion;
    private javax.swing.JTextField campoPersonas;
    private javax.swing.JTextField campoPrecio;
    private javax.swing.JComboBox<String> comboExtras1;
    private javax.swing.JButton eliminarImagenesBoton;
    private javax.swing.JLabel habitacionid;
    private javax.swing.JButton jButton2;
    private javax.swing.JLabel jLabel1;
    private javax.swing.JLabel jLabel2;
    private javax.swing.JLabel jLabel3;
    private javax.swing.JLabel jLabel4;
    private javax.swing.JPanel jPanel1;
    private javax.swing.JPanel jPanel3;
    private javax.swing.JPanel jPanel4;
    private javax.swing.JPanel jPanel5;
    private javax.swing.JScrollPane jScrollPane2;
    private javax.swing.JPanel panelImagenes;
    private javax.swing.JButton seleccionarImgBoton;
    private javax.swing.JTable tablaExtrasHab1;
    // End of variables declaration//GEN-END:variables
}

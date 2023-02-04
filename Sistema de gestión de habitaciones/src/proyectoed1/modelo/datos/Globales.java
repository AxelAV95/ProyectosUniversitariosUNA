/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package proyectoed1.modelo.datos;

import javax.swing.JFileChooser;
import proyectoed1.controlador.ControladorExtra;
import proyectoed1.controlador.ControladorHabitacion;
import proyectoed1.controlador.ControladorReserva;

/**
 *
 * @author adeve
 */
public class Globales {
    /*Variables globales del sistema que se utilizan en varias consultas*/
    
    public static final String rutaGeneral = System.getProperty("user.dir");
    public static final String col[] = {"Código", "Fecha solicitud", "Fecha inicio", "Fecha final", "Cédula", "Cliente"};
    public static final ControladorReserva controladorReserva = new ControladorReserva();
    public static final ControladorHabitacion controladorHabitacion = new ControladorHabitacion();
    public static final  String columnaHabitacionSeleccionadas[] = {"Habitación"};
    public static final JFileChooser  jc = new JFileChooser();
    public static final String[] columnasExtrasSeleccionadas = {"Extra"};
    public static final ControladorExtra controladorExtra = new ControladorExtra();
    public static final String[] columnasTablaExtras = {"Código", "Descripción"};
    
    
   
}

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package proyectoed1.modelo.datos;

import java.io.IOException;
import java.text.ParseException;
import java.util.logging.Level;
import java.util.logging.Logger;
import proyectoed1.controlador.ControladorExtra;
import proyectoed1.controlador.ControladorHabitacion;
import proyectoed1.controlador.ControladorReserva;
import proyectoed1.modelo.dominio.ListaExtra;
import proyectoed1.modelo.dominio.ListaHabitacion;
import proyectoed1.modelo.dominio.ListaReserva;

/**
 *
 * @author adeve
 */
public class Datos {

    /*Contiene todas las estructuras dinámicas que alojarán los diferentes objetos */
    
    //LISTA DE HABITACIONES CIRCULAR
    private static ListaHabitacion listaHabitaciones;
    //LISTA DE EXTRAS
    private static ListaExtra listaExtras;
    //LISTA DE RESERVAS
    private static ListaReserva listaReservas;
    //LISTA DE CONSULTA NUMERO HABITACION

    private static ListaReserva canceladas;

    public static void setListaHabitaciones(ListaHabitacion listaHabitaciones) {
        Datos.listaHabitaciones = listaHabitaciones;
    }

    public static void iniciarListaHabitaciones() {
        ControladorHabitacion ch = new ControladorHabitacion();
        if (listaHabitaciones == null) {
            try {
                listaHabitaciones = ch.obtener();

                //CARGAR LA LISTA CON LOS DATOS DEL FICHERO "HABITACIONES"
                //INVESTIGAR COMO VACIAR Y REINICIAR LA LISTA
            } catch (IOException ex) {
                Logger.getLogger(Datos.class.getName()).log(Level.SEVERE, null, ex);
            }
        }
    }

    public static void resetearListaHabitaciones() {
        if (listaHabitaciones != null) {
            listaHabitaciones = null;

        }
    }

    public static void resetearListaReservas() {
        if (listaReservas != null) {
            listaReservas = null;
        }
    }
    
    public static void resetearListaExtras(){
        if(listaExtras != null){
            listaExtras = null;
        }
    }
    
     public static void resetearListaCanceladas() {
        if (canceladas != null) {
            canceladas = null;
        }
    }

    public static void iniciarListaReservasCanceladas() {
        ControladorReserva cr = new ControladorReserva();
        if (canceladas == null) {
            try {
                canceladas = cr.obtenerCanceladas(listaHabitaciones);

            } catch (IOException ex) {
                Logger.getLogger(Datos.class.getName()).log(Level.SEVERE, null, ex);
            } catch (ParseException ex) {
                Logger.getLogger(Datos.class.getName()).log(Level.SEVERE, null, ex);
            }
        }
    }

    public static void iniciarListaExtras() {
        ControladorExtra ce = new ControladorExtra();
        if (listaExtras == null) {
            try {
                listaExtras = ce.obtenerLista();
            } catch (IOException ex) {
                Logger.getLogger(Datos.class.getName()).log(Level.SEVERE, null, ex);
            }
        }

    }

    public static void iniciarListaReservas() {
        ControladorReserva cr = new ControladorReserva();

        if (listaReservas == null) {
            try {

                listaReservas = cr.obtener(Datos.getListaHabitaciones());
            } catch (IOException ex) {
                Logger.getLogger(Datos.class.getName()).log(Level.SEVERE, null, ex);
            } catch (ParseException ex) {
                Logger.getLogger(Datos.class.getName()).log(Level.SEVERE, null, ex);
            }
        }
    }

    public static ListaHabitacion getListaHabitaciones() {
        return listaHabitaciones;
    }

    public static ListaExtra getListaExtras() {
        return listaExtras;
    }

    public static ListaReserva getListaReservas() {
        return listaReservas;
    }

    public static ListaReserva getCanceladas() {
        return canceladas;
    }

}

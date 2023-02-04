/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package proyectoed1.controlador;

import com.google.zxing.NotFoundException;
import com.google.zxing.WriterException;
import java.io.IOException;
import java.text.ParseException;
import java.util.Date;
import proyectoed1.modelo.dominio.ListaHabitacion;
import proyectoed1.modelo.dominio.ListaReserva;
import proyectoed1.modelo.dominio.NodoReserva;
import proyectoed1.modelo.dominio.Reserva;
import proyectoed1.modelo.negocio.LogicaReserva;

/**
 *
 * @author adeve
 */
public class ControladorReserva {

    /*
     Funcionalidad: Agrega una reserva a la lista simple de reservas
     Parámetros que recibe: Lista de reservas, objeto reserva
     Parámetros que regresa: Verdadero o falso según el proceso
     */
    public boolean agregar(ListaReserva lr, Reserva r) {
        return new LogicaReserva().agregarReserva(lr, r);
    }
    
    /*
    Funcionalidad: Modifica una reserva de la lista simple de reservas, desde la vista de verificar una reserva
    Parámetros que recibe: Lista de reservas, objeto reserva
    Parámetros que regresa: Verdadero o falso según el proceso
    */
    public boolean modificar(ListaReserva lr, Reserva r) {
        return new LogicaReserva().modificarReserva(lr, r);
    }
    
    /*
    Funcionalidad: Elimina una reserva de la lista simple de reservas, desde la vista de verificar una reserva
    Parámetros que recibe: Lista de reservas, objeto reserva
    Parámetros que regresa: Verdadero o falso según el proceso
    */
    public boolean eliminar(ListaReserva lr, int id) {
        return new LogicaReserva().eliminarReserva(lr, id);
    }
   
    /*
    Funcionalidad: Modifica una reserva del archivo "reservaciones.txt", desde la vista de verificar una reserva
    Parámetros que recibe: Lista de reservas, objeto reserva
    Parámetros que regresa: Verdadero o falso según el proceso
    */
    public boolean modificarArchivo(String fichero, Reserva r) throws IOException {
        return new LogicaReserva().modificarArchivo(fichero, r);
    }
    
    /*
    Funcionalidad: Elimina una reserva del archivo "reservaciones.txt", desde la vista de verificar una reserva
    Parámetros que recibe: Lista de reservas, objeto reserva
    Parámetros que regresa: Verdadero o falso según el proceso
    */
    public boolean eliminarReservaArchivo(String fichero, Reserva r) throws IOException {
        return new LogicaReserva().eliminarReservaArchivo(fichero, r);
    }

    /*
    Funcionalidad: Obtiene los registros del fichero "reservaciones.txt" y los añade a la lista de reservas
    Parámetros que recibe: Lista de habitaciones
    Parámetros que regresa: Lista simple de reservas
    */
    public ListaReserva obtener(ListaHabitacion lh) throws IOException, ParseException {
        return new LogicaReserva().leerFichero(lh);
    }
    
    /*
    Funcionalidad: Obtiene los registros del fichero "cancelaciones.txt" y los añade a la lista de reservas canceladas
    Parámetros que recibe: Lista de habitaciones
    Parámetros que regresa: Lista simple de reservas
    */
    public ListaReserva obtenerCanceladas(ListaHabitacion lh) throws IOException, ParseException {
        return new LogicaReserva().leerFicheroCanceladas(lh);
    }
    
    /*
    Funcionalidad: Obtiene las reservas de la lista según el número de cédula del cliente
    Parámetros que recibe: Lista de reservas, cedula 
    Parámetros que regresa: Lista simple de reservas
    */
    public ListaReserva obtenerListaClienteCedula(ListaReserva lr, String cedula) {
        return new LogicaReserva().obtenerListaClienteCedula(lr, cedula);
    }

    //obtener id
    public int obtenerNuevoID(String fichero) throws IOException {
        return new LogicaReserva().obtenerNuevoID(fichero);
    }
    
    /*
    Funcionalidad: Genera un codigo QR basado en el número de la nueva reserva creada.
    Parámetros que recibe: Objeto reserva, ruta general del proyecto
    Parámetros que regresa: Verdadero o falso según el proceso
    */
    public boolean generarQR(Reserva r, String rutaGeneral) throws WriterException, IOException {
        return new LogicaReserva().generarReservaQR(r, rutaGeneral);
    }
    
     /*
    Funcionalidad: Lee un codigo QR basado en el número de reserva creada.
    Parámetros que recibe: Ruta de la imagen QR de la reserva que contiene el ID
    Parámetros que regresa: Número de reserva decodificado
    */
    public String leerReservaQR(String ID) throws IOException, NotFoundException {
        return new LogicaReserva().leerReservaQR(ID);
    }
    
     /*
        Funcionalidad: Guarda el registro de una reserva en el archivo "reservaciones.txt"
    Parámetros que recibe: Ruta del archivo, objeto reserva
    Parámetros que regresa: Verdadero o falso según el resultado
    */
    public boolean archivar(String fichero, Reserva r) throws IOException {
        return new LogicaReserva().archivarReserva(fichero, r);
    }
    
    
    /*
        Funcionalidad: Guarda el registro de una reserva cancelada en el archivo "cancelaciones.txt"
    Parámetros que recibe: Ruta del archivo, objeto reserva
    Parámetros que regresa: Verdadero o falso según el resultado
    */
    public boolean archivarCancelado(String fichero, Reserva r) throws IOException {
        return new LogicaReserva().archivarCancelados(fichero, r);
    }
    
    /*
        Funcionalidad: Obtiene una reserva de la lista según el código QR decodificado anteriormente
    Parámetros que recibe: Lista simple de reservas, id de la reserva
    Parámetros que regresa: Nodo de la reserva
    */
    public NodoReserva obtenerReservaQR(ListaReserva lr, String id) {
        return new LogicaReserva().obtenerReservaQR(lr, id);
    }
    
    /*
        Funcionalidad: Verifica la disponibilidad de una habitación en una fecha solicitada
    Parámetros que recibe: Lista simple de reservas, id de la reserva, fecha solicidata
    Parámetros que regresa: Verdadero o falso según el resultado
    */
    public boolean verificarFechas(ListaReserva lr, String id, Date solicitada) {
        return new LogicaReserva().verificarFechas(lr, id, solicitada);
    }
    
    /*
        Funcionalidad: Obtiene todas las reservas que estén dentro de un rango de fechas dadas
    Parámetros que recibe: Lista simple de reservas, fecha solicitada 1 , fecha solicitada 2
    Parámetros que regresa: Lista de reservas con los objetos en ese rango de fechas
    */
    public ListaReserva obtenerListaFechas(ListaReserva lr, Date fecha1, Date fecha2) {
        return new LogicaReserva().obtenerListaFechas(lr, fecha1, fecha2);
    }

}

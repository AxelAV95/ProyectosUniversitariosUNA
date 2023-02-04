/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package proyectoed1.modelo.dominio;

import java.util.Date;

/**
 *
 * @author adeve
 */
public class Reserva {
    private int numeroReservacion;
    private String ruta;
    private Date fechaActual;
    private Date fechaInicio;
    private Date fechaFinal;
    private Cliente cliente;
    
    //lista de habitaciones reservadas
    private ListaHabitacion listaHabitaciones;

    public Reserva() {
    }

    public Reserva(int numeroReservacion, String ruta, Date fechaActual, Date fechaInicio, Date fechaFinal, Cliente cliente, ListaHabitacion listaHabitaciones) {
        this.numeroReservacion = numeroReservacion;
        this.ruta = ruta;
        this.fechaActual = fechaActual;
        this.fechaInicio = fechaInicio;
        this.fechaFinal = fechaFinal;
        this.cliente = cliente;
        this.listaHabitaciones = listaHabitaciones;
    }

    public int getNumeroReservacion() {
        return numeroReservacion;
    }

    public void setNumeroReservacion(int numeroReservacion) {
        this.numeroReservacion = numeroReservacion;
    }

    public String getRuta() {
        return ruta;
    }

    public void setRuta(String ruta) {
        this.ruta = ruta;
    }

    public Date getFechaActual() {
        return fechaActual;
    }

    public void setFechaActual(Date fechaActual) {
        this.fechaActual = fechaActual;
    }

    public Date getFechaInicio() {
        return fechaInicio;
    }

    public void setFechaInicio(Date fechaInicio) {
        this.fechaInicio = fechaInicio;
    }

    public Date getFechaFinal() {
        return fechaFinal;
    }

    public void setFechaFinal(Date fechaFinal) {
        this.fechaFinal = fechaFinal;
    }

    public Cliente getCliente() {
        return cliente;
    }

    public void setCliente(Cliente cliente) {
        this.cliente = cliente;
    }

    public ListaHabitacion getListaHabitaciones() {
        return listaHabitaciones;
    }

    public void setListaHabitaciones(ListaHabitacion listaHabitaciones) {
        this.listaHabitaciones = listaHabitaciones;
    }

    @Override
    public String toString() {
        return "\nReserva{" + "numeroReservacion=" + numeroReservacion + ", ruta=" + ruta + ", fechaActual=" + fechaActual + ", fechaInicio=" + fechaInicio + ", fechaFinal=" + fechaFinal + ", cliente=" + cliente + ", listaHabitaciones=" + listaHabitaciones + '}';
    }
    
    
    
    
    
}

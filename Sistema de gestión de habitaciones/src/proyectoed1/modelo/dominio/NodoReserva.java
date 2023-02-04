/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package proyectoed1.modelo.dominio;

/**
 *
 * @author adeve
 */
public class NodoReserva {
    
    private Reserva reserva;
    private NodoReserva siguiente;

    public NodoReserva() {
    }

    public NodoReserva(Reserva reserva, NodoReserva siguiente) {
        this.reserva = reserva;
        this.siguiente = siguiente;
    }

    public Reserva getReserva() {
        return reserva;
    }

    public void setReserva(Reserva reserva) {
        this.reserva = reserva;
    }

    public NodoReserva getSiguiente() {
        return siguiente;
    }

    public void setSiguiente(NodoReserva siguiente) {
        this.siguiente = siguiente;
    }
    
    
}

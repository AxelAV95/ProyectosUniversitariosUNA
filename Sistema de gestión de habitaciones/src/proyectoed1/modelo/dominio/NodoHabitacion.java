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
public class NodoHabitacion {
    
    private Habitacion habitacion;
    private NodoHabitacion siguiente;
    private NodoHabitacion anterior;

    public NodoHabitacion() {
    }
    
    

    public NodoHabitacion(Habitacion habitacion, NodoHabitacion primero) {
        this.habitacion = habitacion;
        this.siguiente = primero;
    }

    public Habitacion getHabitacion() {
        return habitacion;
    }

    public void setHabitacion(Habitacion habitacion) {
        this.habitacion = habitacion;
    }

    public NodoHabitacion getSiguiente() {
        return siguiente;
    }

    public void setSiguiente(NodoHabitacion siguiente) {
        this.siguiente = siguiente;
    }

    public NodoHabitacion getAnterior() {
        return anterior;
    }

    public void setAnterior(NodoHabitacion anterior) {
        this.anterior = anterior;
    }
    
    
    
    
    
}

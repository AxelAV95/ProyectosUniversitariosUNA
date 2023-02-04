/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package proyectoed1.modelo.dominio;

/**
 *
 * @author adeve Lista circula doble
 */
public class ListaHabitacion {
 
    private NodoHabitacion primero;
    private NodoHabitacion ultimo;

    public ListaHabitacion() {
        this.primero = null;
        this.ultimo = null;
    }
    
    

    public NodoHabitacion getPrimero() {
        return primero;
    }

    public void setPrimero(NodoHabitacion primero) {
        this.primero = primero;
    }

    public NodoHabitacion getUltimo() {
        return ultimo;
    }

    public void setUltimo(NodoHabitacion ultimo) {
        this.ultimo = ultimo;
    }
    
    
}

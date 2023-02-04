/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package proyectoed1.modelo.dominio;

/**
 *
 * @author adeve Lista simple
 */
public class ListaReserva {
    private NodoReserva primero;
    private NodoReserva ultimo;

    public ListaReserva() {
        this.primero = null;
        this.ultimo = null;
    }

    public NodoReserva getPrimero() {
        return primero;
    }

    public void setPrimero(NodoReserva primero) {
        this.primero = primero;
    }

    public NodoReserva getUltimo() {
        return ultimo;
    }

    public void setUltimo(NodoReserva ultimo) {
        this.ultimo = ultimo;
    }
    
    
    
    
}

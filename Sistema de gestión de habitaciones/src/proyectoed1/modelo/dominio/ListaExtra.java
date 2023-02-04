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
public class ListaExtra {
    
    private NodoExtra primero;
    private NodoExtra ultimo;

    public ListaExtra() {
        this.primero = null;
        this.ultimo = null;
    }

    public NodoExtra getPrimero() {
        return primero;
    }

    public void setPrimero(NodoExtra primero) {
        this.primero = primero;
    }

    public NodoExtra getUltimo() {
        return ultimo;
    }

    public void setUltimo(NodoExtra ultimo) {
        this.ultimo = ultimo;
    }
    
    
    
    
    
}

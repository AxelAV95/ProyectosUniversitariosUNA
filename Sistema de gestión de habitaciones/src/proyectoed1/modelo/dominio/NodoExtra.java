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
public class NodoExtra {
    
    private Extra extra;
    private NodoExtra siguiente;

    public NodoExtra() {
    }

    public NodoExtra(Extra extra, NodoExtra siguiente) {
        this.extra = extra;
        this.siguiente = siguiente;
    }

    public Extra getExtra() {
        return extra;
    }

    public void setExtra(Extra extra) {
        this.extra = extra;
    }

    public NodoExtra getSiguiente() {
        return siguiente;
    }

    public void setSiguiente(NodoExtra siguiente) {
        this.siguiente = siguiente;
    }
    
    
}

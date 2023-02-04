/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package modelo.dominio;

/**
 *
 * @author adeve
 */
public class ListaPalabras {
    private NodoPalabra primero;
    private NodoPalabra ultimo;
    
    public ListaPalabras(){
        this.primero = null;
        this.ultimo = null;
    }

    public NodoPalabra getPrimero() {
        return primero;
    }

    public void setPrimero(NodoPalabra primero) {
        this.primero = primero;
    }

    public NodoPalabra getUltimo() {
        return ultimo;
    }

    public void setUltimo(NodoPalabra ultimo) {
        this.ultimo = ultimo;
    }
    
    
}

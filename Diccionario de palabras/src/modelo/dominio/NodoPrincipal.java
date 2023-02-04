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
public class NodoPrincipal {

    private char letra;
    private NodoPrincipal siguiente;
    private Arbol arbol;
    private ListaPalabras palabras;

    public Arbol getArbol() {
        return arbol;
    }

    public void setArbol(Arbol arbol) {
        this.arbol = arbol;
    }
    

    public NodoPrincipal() {
    }

    public NodoPrincipal(char c) {
        this.letra = c;
        this.palabras = new ListaPalabras();

    }

    public NodoPrincipal(char letra, NodoPrincipal siguiente) {
        this.letra = letra;
        this.siguiente = siguiente;
    }

    public ListaPalabras getPalabras() {
        return palabras;
    }

    public void setPalabras(ListaPalabras palabras) {
        this.palabras = palabras;
    }

    public char getLetra() {
        return letra;
    }

    public void setLetra(char letra) {
        this.letra = letra;
    }

    public NodoPrincipal getSiguiente() {
        return siguiente;
    }

    public void setSiguiente(NodoPrincipal siguiente) {
        this.siguiente = siguiente;
    }

}

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package modelo.datos;

import modelo.dominio.ListaPalabras;
import modelo.dominio.ListaPrincipal;

/**
 *
 * @author adeve
 */
public class Datos {
    
    private static ListaPrincipal listaPrincipal;
    private static ListaPalabras listaPalabras;

    public static ListaPalabras getListaPalabras() {
        return listaPalabras;
    }

    public static void setListaPalabras(ListaPalabras listaPalabras) {
        Datos.listaPalabras = listaPalabras;
    }
    
    
    
    
    public static void iniciarListaPrincipal() {
        if (listaPrincipal == null) {
            listaPrincipal = new ListaPrincipal();
        }
    }
    
    public static void iniciarListaPalabras() {
        if (listaPalabras== null) {
            listaPalabras = new ListaPalabras();
        }
    }

    public static ListaPrincipal getListaPrincipal() {
        return listaPrincipal;
    }

    public static void setListaPrincipal(ListaPrincipal listaPrincipal) {
        Datos.listaPrincipal = listaPrincipal;
    }
    
    
}

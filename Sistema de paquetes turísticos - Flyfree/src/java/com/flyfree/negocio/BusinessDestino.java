/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package com.flyfree.negocio;

import com.flyfree.datos.DestinosData;
import com.flyfree.dominio.Destinos;
import java.sql.SQLException;
import java.util.LinkedList;

/**
 *
 * @author andra
 */
public class BusinessDestino {
    
    private DestinosData dd;
    
    public BusinessDestino(){
        this.dd = new DestinosData();
    }
    
    public LinkedList<Destinos> getDestinos() throws SQLException{
        return dd.getDestino();
    }
}

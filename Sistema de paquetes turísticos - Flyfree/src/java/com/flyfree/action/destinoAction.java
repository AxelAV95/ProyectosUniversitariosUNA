/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package com.flyfree.action;

import com.flyfree.dominio.Destinos;
import com.flyfree.negocio.BusinessDestino;
import java.util.LinkedList;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

import org.apache.struts.actions.DispatchAction;
import org.apache.struts.action.ActionForm;
import org.apache.struts.action.ActionMapping;
import org.apache.struts.action.ActionForward;

/**
 *
 * @author andra
 */
public class destinoAction extends DispatchAction {

    /* forward name="success" path="" */
    private final static String SUCCESS = "success";

    /**
     * This is the Struts action method called on
     * http://.../actionPath?method=myAction1, where "method" is the value
     * specified in <action> element : ( <action parameter="method" .../> )
     */
    public ActionForward mostrarDestinos(ActionMapping mapping, ActionForm form,
            HttpServletRequest request, HttpServletResponse response)
            throws Exception {
        BusinessDestino bd = new BusinessDestino();
        LinkedList<Destinos> listaDestinos = bd.getDestinos();
        String url = "";
        
        boolean bandera = false;
        boolean obtuvo;
        obtuvo = !listaDestinos.isEmpty();
        
        if(obtuvo){
            request.setAttribute("destinos", listaDestinos);
             return mapping.findForward("ListaDestinos");
        }else{
            return mapping.findForward("welcome");
        }
        
    }

    /**
     * This is the Struts action method called on
     * http://.../actionPath?method=myAction2, where "method" is the value
     * specified in <action> element : ( <action parameter="method" .../> )
     */
    public ActionForward myAction2(ActionMapping mapping, ActionForm form,
            HttpServletRequest request, HttpServletResponse response)
            throws Exception {
        
        return mapping.findForward(SUCCESS);
    }
}

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package com.flyfree.servlet;

import com.flyfree.datos.PersonaData;
import com.flyfree.dominio.Persona;
import java.io.IOException;
import java.io.PrintWriter;
import java.sql.SQLException;
import java.util.LinkedList;
import java.util.logging.Level;
import java.util.logging.Logger;
import javax.servlet.RequestDispatcher;
import javax.servlet.ServletException;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import javax.swing.JOptionPane;

/**
 *
 * @author andra
 */
public class EliminarPersonaServlet extends HttpServlet {

    /**
     * Processes requests for both HTTP <code>GET</code> and <code>POST</code>
     * methods.
     *
     * @param request servlet request
     * @param response servlet response
     * @throws ServletException if a servlet-specific error occurs
     * @throws IOException if an I/O error occurs
     */
    protected void processRequest(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        
        LinkedList<Persona>listaPersonas = null;
        String temp = request.getParameter("temp");
        //JOptionPane.showMessageDialog(null,temp);
        if(temp.equals("Buscar")){
            String email = request.getParameter("email");  
            //JOptionPane.showMessageDialog(null,codigo);
            try{
                listaPersonas= new PersonaData().BuscarPersona(email);
            }catch (SQLException ex){
                Logger.getLogger(EliminarPersonaServlet.class.getName()).log(Level.SEVERE, null, ex);
            }     
            //JOptionPane.showMessageDialog(null,listaLibros);
            JOptionPane.showMessageDialog(null,listaPersonas.get(0).getEmail() );
            request.setAttribute("Personas", listaPersonas);    
            RequestDispatcher despachador = request.getRequestDispatcher("eliminarPersona.jsp"); 
            despachador.forward(request, response);
            temp = "";
       }else{ 
            String url; 
            String email = request.getParameter("email");          
            boolean eliminar = false; 
            PersonaData consulta = new PersonaData(); 
  
            try{ 
                eliminar = consulta.eliminarPersona(email);
            } 
            catch (SQLException ex){
                Logger.getLogger(modificarPaqueteServlet.class.getName()).log(Level.SEVERE, null, ex);
            }
            if(eliminar){
                url = "exito.jsp";
            }else{
                url = "error.jsp";
            }
            RequestDispatcher despachador = request.getRequestDispatcher(url);
            despachador.forward(request, response);
       }
    }

    // <editor-fold defaultstate="collapsed" desc="HttpServlet methods. Click on the + sign on the left to edit the code.">
    /**
     * Handles the HTTP <code>GET</code> method.
     *
     * @param request servlet request
     * @param response servlet response
     * @throws ServletException if a servlet-specific error occurs
     * @throws IOException if an I/O error occurs
     */
    @Override
    protected void doGet(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        processRequest(request, response);
    }

    /**
     * Handles the HTTP <code>POST</code> method.
     *
     * @param request servlet request
     * @param response servlet response
     * @throws ServletException if a servlet-specific error occurs
     * @throws IOException if an I/O error occurs
     */
    @Override
    protected void doPost(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        processRequest(request, response);
    }

    /**
     * Returns a short description of the servlet.
     *
     * @return a String containing servlet description
     */
    @Override
    public String getServletInfo() {
        return "Short description";
    }// </editor-fold>

}

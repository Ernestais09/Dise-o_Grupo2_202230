/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.mycompany.mavenproject2;

import java.sql.Connection;
import java.sql.DriverManager;

/**
 *
 * @author Ricardo Ranauro
 */
public class NewClass {
    Connection conectar =null;
    
    public  Connection estableceConexion()  {
        try {
           Class.forName("com.mysql.jdbc.Driver");
           conectar=DriverManager.getConnection("basegps.c4zj4qb97ay3.us-east-1.rds.amazonaws.com","Diseno","GPShola123");
        
        } catch(Exception e){
         
        }
        
      return conectar;  
}
    }

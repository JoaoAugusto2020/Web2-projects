package com.example.demo.controllers;

import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.RequestMapping;



@Controller
@RequestMapping("/product")
public class ProductController {

    @GetMapping("/teste")
    public String getMethodName() {
        return "/index";
    }

}

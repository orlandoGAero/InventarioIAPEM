/*CADENA*/
function letras(cadena,z)
{
	band=0;
	var nodo=1;
	for (c in cadena)
	{
		aux=cadena.charCodeAt(c);
		
		if(nodo==1 && (aux)>=65  || (aux)==239 && (aux)<=90 || (aux)==165) /*Letras mayúsculas, acento, Ñ*/
		{
			nodo=2;
		}
		else /* ´=239 Ñ =165 */
		{
			if(nodo==2 && ((aux)>=65 || (aux)==239 && (aux)<=90 || (aux)==165 || (aux)>=97 || (aux)==239 && (aux)<=122 || (aux)==164))/*Letras mayúsculas o minisculas, acento Ñ o ñ */
			{ 
				nodo=2; /* primer nodo terminal*/
			}
			else
			{
				if(nodo==2 && (aux)==32)/*Espacio*/
				{
					nodo=3;
				}
				else
				{
					if(nodo==3 && (aux)>=65  || (aux)==239 && (aux)<=90 || (aux)==165) /*Letras mayúsculas, acento, Ñ*/
					{
						nodo=4;
					}
					else
					{
						if(nodo==4 && ((aux)>=65 || (aux)==239 && (aux)<=90 || (aux)==165 || (aux)>=97 || (aux)==239 && (aux)<=122 || (aux)==164))/*Letras mayúsculas o minisculas, acento Ñ o ñ */
						{ 
							nodo=4; /* segundo nodo terminal*/
						}
						else
						{
							if(nodo==4 && (aux)==32)/*Espacio*/
							{
								nodo=5;
							}
							else
							{
								if(nodo==5 && (aux)>=65  || (aux)==239 && (aux)<=90 || (aux)==165) /*Letras mayúsculas, acento, Ñ*/
								{
									nodo=6; 
								}
								else
								{
									if(nodo==6 && ((aux)>=65 || (aux)==239 && (aux)<=90 || (aux)==165 || (aux)>=97 || (aux)==239 && (aux)<=122 || (aux)==164))/*Letras mayúsculas o minisculas, acento Ñ o ñ */
									{ 
										nodo=6; /* tercer nodo terminal*/
									}
									else
									{
										if(nodo==6 && (aux)==32)/*Espacio*/
										{
											nodo=7;
										}
										else
										{
											if(nodo==7 && (aux)>=65  || (aux)==239 && (aux)<=90 || (aux)==165) /*Letras mayúsculas, acento, Ñ*/
											{
												nodo=8;
											}
											else
											{
												if(nodo==8 && ((aux)>=65 || (aux)==239 && (aux)<=90 || (aux)==165 || (aux)>=97 || (aux)==239 && (aux)<=122 || (aux)==164))/*Letras mayúsculas o minisculas, acento Ñ o ñ */
												{ 
													nodo=8; /* cuarto nodo terminal*/
												}
												else
												{
													if(nodo==8 && (aux)==32)/*Espacio*/
													{
														nodo=9;
													}
													else
													{
														if(nodo==9 && (aux)>=65  || (aux)==239 && (aux)<=90 || (aux)==165) /*Letras mayúsculas, acento, Ñ*/
														{
															nodo=10;
														}
														else
														{
															if(nodo==10 && ((aux)>=65 || (aux)==239 && (aux)<=90 || (aux)==165 || (aux)>=97 || (aux)==239 && (aux)<=122 || (aux)==164))/*Letras mayúsculas o minisculas, acento Ñ o ñ */
															{ 
																nodo=10; /* quinto nodo terminal*/
															}
															else
															{
																if(nodo==10 && (aux)==32)/*Espacio*/
																{
																	nodo=11;
																}
																else
																{
																	if(nodo==11 && (aux)>=65  || (aux)==239 && (aux)<=90 || (aux)==165) /*Letras mayúsculas, acento, Ñ*/
																	{
																		nodo=12;
																	}
																	else
																	{
																		if(nodo==12 && ((aux)>=65 || (aux)==239 && (aux)<=90 || (aux)==165 || (aux)>=97 || (aux)==239 && (aux)<=122 || (aux)==164))/*Letras mayúsculas o minisculas, acento Ñ o ñ */
																		{ 
																			nodo=12; /* sexto nodo terminal*/
																		}
																		else
																		{
																			if(nodo==12 && (aux)==32)/*Espacio*/
																			{
																				nodo=13;
																			}
																			else
																			{
																				if(nodo==13 && (aux)>=65  || (aux)==239 && (aux)<=90 || (aux)==165) /*Letras mayúsculas, acento, Ñ*/
																				{
																					nodo=14;
																				}
																				else
																				{
																					if(nodo==14 && ((aux)>=65 || (aux)==239 && (aux)<=90 || (aux)==165 || (aux)>=97 || (aux)==239 && (aux)<=122 || (aux)==164))/*Letras mayúsculas o minisculas, acento Ñ o ñ */
																					{ 
																						nodo=14; /* septimo nodo terminal*/
																					}
																					else
																					{
																						nodo=0;
																						break;
																					}	
																				}	
																			}	
																		}
																	}	
																}
															}		
														}	
													}
												}	
											}
										}	
									}
								}
							}
						}
					}	
				}
			}
		}   
	}
	if( (nodo==2)||(nodo==4)||(nodo==6)||(nodo==8)||(nodo==10)||(nodo==12)||(nodo==14) )
	{
		z.style.background='url(../imagenes/ok.png)no-repeat';//cadena tecleeada correcta
		band=0;
	}
	else
	{
		z.style.background='url(../imagenes/error.png)no-repeat';//cadena tecleeada incorrecta
		band=0;
	}
	return band;
}
/*--------------------------------------------------------------------------------------------------*/

/*TELÉFONO*/
function tel(numero,z)
{
	band=0;
	var nodo=1;
	for (n in numero)
	{
		aux=numero.charCodeAt(n);
		
		if(nodo==1 && ((aux)>=48 && (aux)<=57))/*Números*/
		{
			nodo=2;
		}
		else
		{
			if(nodo==2 && ((aux)>=48 && (aux)<=57))/*Números*/
			{
				nodo=3;
			}
			else
			{
				if(nodo==3 && ((aux)>=48 && (aux)<=57))/*Números*/
				{
					nodo=4;
				}
				else
				{
					if(nodo==4 && ((aux)>=48 && (aux)<=57))/*Números*/
					{
						nodo=5;
					}
					else
					{
						if(nodo==5 && ((aux)>=48 && (aux)<=57))/*Números*/
						{
							nodo=6;
						}
						else
						{
							if(nodo==6 && ((aux)>=48 && (aux)<=57))/*Números*/
							{
								nodo=7;
							}
							else
							{
								if(nodo==7 && ((aux)>=48 && (aux)<=57))/*Números*/
								{
									nodo=8;
								}
								else
								{
									if(nodo==8 && ((aux)>=48 && (aux)<=57))/*Números*/
									{
										nodo=9;
									}
									else
									{
										if(nodo==9 && ((aux)>=48 && (aux)<=57))/*Números*/
										{
											nodo=10;
										}
										else
										{
											if(nodo==10 && ((aux)>=48 && (aux)<=57))/*Números*/
											{
												nodo=11;
											}						
											else
											{
												nodo=0;
												break;
											}
										}
									}
								}
							}
						}
					}
				}
			}
		}
	}
	if(nodo==11)
	{
		z.style.background='url(../imagenes/ok.png)no-repeat';//cadena tecleeada correcta
		band=0;
	}
	else
	{
		z.style.background='url(../imagenes/error.png)no-repeat';//cadena tecleeada correcta
		band=0;
	}
return band;
}

/*EXTENSIÓN*/
function ext(num,c)
{
	band=0;
	var nodo=1;
	for (n in num)
	{
		aux=num.charCodeAt(n);
		
		if(nodo==1 && ((aux)>=48 && (aux)<=57))/*Números*/
		{
			nodo=2;
		}
		else
		{
			if(nodo==2 && ((aux)>=48 && (aux)<=57))/*Números*/
			{
				nodo=3;
			}
			else
			{
				if(nodo==3 && ((aux)>=48 && (aux)<=57))/*Números*/
				{
					nodo=4;
				}
				else
				{
					nodo=0;
					break;
				}
			}
		}
	}
	if(nodo==4)
	{
		c.style.background='url(../imagenes/ok.png)no-repeat';//cadena tecleeada correcta
		band=0;
	}
	else
	{
		c.style.background='url(../imagenes/error.png)no-repeat';//cadena tecleeada correcta
		band=0;
	}
return band;
}

/*-----------------------------------------------------CORREO---------------------------------------------------------*/

	function email(correo,z)
	{
		band=0;
		var nodo=1;
		for (em in correo)
		{
		aux=correo.charCodeAt(em);
		
			if (nodo==1 && ((aux)>=97 && (aux)<=122 || (aux)>=65 && (aux)<=90)) /* letras minúsculas y mayúsculas*/
			{	
				nodo = 2;	
			} else 
				{
					if (nodo==2 && ((aux)>=97 && (aux)<=122 || (aux)>=65 && (aux)<=90 || (aux)>=48 && (aux)<=57 || (aux)==46 || (aux)==95 || (aux)==45)) /* letras minúsculas y mayúsculas, números, punto 46, guion bajo 95, guion medio 45*/
					{
						nodo = 2;
					} else 
						{
							if (nodo==2 && (aux)==64) /* 64 = @ */
							{
								nodo = 3;
							} else 
								{
									if (nodo==3 && ((aux)>=97 && (aux)<=122 || (aux)>=48 && (aux)<=57)) /* letras minúsculas y números */
									{
										nodo = 4;
									} else
										{
											if (nodo==4 && ((aux)>=97 && (aux)<=122 || (aux)>=48 && (aux)<=57 || (aux)==95 || (aux)==45)) /* letras minúsculas, números, guion bajo 95, guion medio 45*/
											{
												nodo = 4;
											} else
												{
													if (nodo==4 && (aux)==46) /*muestra codigo ASCCI de punto 46*/
													{
														nodo = 5;
													} else
														{
															if (nodo==5 && ((aux)>=97 && (aux)<=122)) /* letras minúsculas */
															{
																nodo = 6;
															} else
																{
																	if (nodo==6 && ((aux)>=97 && (aux)<=122)) /* letras minúsculas */
																	{
																		nodo = 6; /*pasa el nodo 6, primer nodo terminal*/
																	} else 
																		{
																			if (nodo==6 && (aux)==46) /* muestra codigo ASCCI de punto*/  
																			{
																				nodo = 7;
																			} else
																				{
																					if (nodo==7&& ((aux)>=97 && (aux)<=122)) /* letras minúsculas */
																					{
																						nodo = 8;
																					} else
																						{
																							if (nodo==8 && ((aux)>=97 && (aux)<=122)) /* letras minúsculas */
																							{
																								nodo = 9; /* pasa al nodo 9, nodo terminal*/
																							} else
																								{
																									nodo = 0;
																									break;
																								}
																						}
																				}
																		}
																}
														}
												}
										}
								}	
						}
				}
		}

		if ((nodo==6)||(nodo==9)) /*nodos terminales*/ 
		{
			z.style.background='url(../imagenes/ok.png)no-repeat';//cadena tecleeada correcta
			band=0;
		} else
			{
				z.style.background='url(../imagenes/error.png)no-repeat';//cadena tecleeada incorrecta
				band=0;
			}
			return band;
	}
	/* ------------------------------------------------------------------------------------------------------------------- */

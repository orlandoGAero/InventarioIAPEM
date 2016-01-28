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
		z.style.background='url(../../imagenes/ok.png)no-repeat';//cadena tecleeada correcta
		band=0;
	}
	else
	{
		z.style.background='url(../../imagenes/error.png)no-repeat';//cadena tecleeada correcta
		band=0;
	}
return band;
}

/*Nombre Bienes Muebles*/
function nomInm(cadena,z)
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
	if( (nodo==2)||(nodo==4)||(nodo==6) )
	{
		z.style.background='url(../../imagenes/ok.png)no-repeat';//cadena tecleeada correcta
		band=0;
	}
	else
	{
		z.style.background='url(../../imagenes/error.png)no-repeat';//cadena tecleeada correcta
		band=0;
	}
return band;
}

/*TELÉFONO*/
function telef(numero,z)
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
		z.style.background='url(../../imagenes/ok.png)no-repeat';//cadena tecleeada correcta
		band=0;
	}
	else
	{
		z.style.background='url(../../imagenes/error.png)no-repeat';//cadena tecleeada correcta
		band=0;
	}
return band;
}

/*CÓDIGO POSTAL*/
function codpo(num,c)
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
							nodo=0;
							break;
						}
					}
				}
			}
		}
	}
	if(nodo==6)
	{
		c.style.background='url(../../imagenes/ok.png)no-repeat';//cadena tecleeada correcta
		band=0;
	}
	else
	{
		c.style.background='url(../../imagenes/error.png)no-repeat';//cadena tecleeada correcta
		band=0;
	}
return band;
}

/*dirección (calle y colonia)*/
function dire(direccion,z)
{
	band=0;
	var nodo=1;
	for (d in direccion)
	{
		aux=direccion.charCodeAt(d);
		
		if(nodo==1 && (aux)>=65 && (aux)<=90 || (aux)>=48 && (aux)<=57)/*Letras mayúsculas 65-90 Letras minúsculas 48-57*/
		{
			nodo=2;
		}
		else /* ´ =239 Ñ=165 */
		{
			if(nodo==2 && (aux)>=65 || (aux)==239 && (aux)<=90 || (aux)==165 || (aux)>=48 && (aux)<=57)/*Letras mayúsculas y minúsculas*/
			{
				nodo=2;
			}
			else
			{
				if(nodo==2 && (aux)==32)/*Espacio*/
				{
					nodo=2;
				}
				else
				{
					nodo=0;
					break;
				}
			}
		}   
	}
	if(nodo==2)
	{
		z.style.background='url(../../imagenes/ok.png)no-repeat';//cadena tecleeada correcta
		band=0;
	}
	else
	{
		z.style.background='url(../../imagenes/error.png)no-repeat';//cadena tecleeada correcta
		band=0;
	}
return band;
}

/*Ciudad*/
function cdad(ciud,z)
{
	band=0;
	var nodo=1;
	for (c in ciud)
	{
		aux=ciud.charCodeAt(c);
		
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
	if( (nodo==2)||(nodo==4)||(nodo==6)||(nodo==8)||(nodo==10) )
	{
		z.style.background='url(../../imagenes/ok.png)no-repeat';//cadena tecleeada correcta
		band=0;
	}
	else
	{
		z.style.background='url(../../imagenes/error.png)no-repeat';//cadena tecleeada correcta
		band=0;
	}
return band;
}

/*Número*/
function num(no,z)
{
	band=0;
	var nodo=1;
	for (n in no)
	{
		aux=no.charCodeAt(n);
		
		if(nodo==1 && ((aux)>=48 && (aux)<=57))/*Números*/
		{
			nodo=2;
		}
		else
		{
			if(nodo==2 && ((aux)>=48 && (aux)<=57))/*Números*/
			{
				nodo=2;
			}
			else
			{
				nodo=0;
				break;
			}
		}
	}
	if(nodo==2)
	{
		z.style.background='url(../../imagenes/ok.png)no-repeat';//cadena tecleeada correcta
		band=0;
	}
	else
	{
		z.style.background='url(../../imagenes/error.png)no-repeat';//cadena tecleeada correcta
		band=0;
	}
return band;
}

/*Costo*/
function cost(digito,z)
{
	band=0;
	var nodo=1;
	for (d in digito)
	{
		aux=digito.charCodeAt(d);
		
		if(nodo==1 && (aux)>=48 && (aux)<=57)
		{
			nodo=2;
		}
		else
		{
			if(nodo==2 && (aux)>=48 && (aux)<=57)
			{
				nodo=2;
			}
			else
			{
				if(nodo==2 && (aux)==46)/* punto=46 */
				{
					nodo=3;
				}
				else
				{
					if(nodo==3 && (aux)>=48 && (aux)<=57)
					{
						nodo=4;
					}
					else
					{
						if(nodo==4 && (aux)>=48 && (aux)<=57)
						{
							nodo=5;
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
	if(nodo==2||nodo==5)
	{
		z.style.background='url(../../imagenes/ok.png)no-repeat';//cadena tecleeada correcta
		band=0;
	}
	else
	{
		z.style.background='url(../../imagenes/error.png)no-repeat';//cadena tecleeada correcta
		band=0;
	}
return band;
}

/*Código nuevo*/
function codnuevo(ncod,z)
{
	nodo=0;
	var nodo=1;
	for(c in ncod)
	{
		aux=ncod.charCodeAt(c);
		if(nodo==1 && (aux)>=65 && (aux)<=90)/*Letras*/
		{
			nodo=2;
		}
		else
		{
			if(nodo==2 && (aux)>=65 && (aux)<=90)/*Varias Letras*/
			{
				nodo=2;
			}
			else
			{
				if(nodo==2 && (aux)>=48 && (aux)<=57)/*Numeros = 1*/
				{
					nodo=3;
				}
				else
				{
					if(nodo==3 && (aux)>=48 && (aux)<=57)/*Numeros = 2*/
					{
						nodo=4;
					}
					else
					{
						if(nodo==4 && (aux)>=48 && (aux)<=57)/*Numeros = 3*/
						{
							nodo=5;
						}
						else
						{
							if(nodo==5 && (aux)>=48 && (aux)<=57)/*Numeros = 4*/
							{
								nodo=6;
							}
							else
							{
								if(nodo==6 && (aux)>=48 && (aux)<=57)/*Numeros = 5*/
								{
									nodo=7;
								}
								else
								{
									if(nodo==7 && (aux)>=48 && (aux)<=57)/*Numeros = 6*/
									{
										nodo=8;
									}
									else
									{
										if(nodo==8 && (aux)==45)/*Guion*/
										{
											nodo=9;
										}
										else
										{
											if(nodo==9 && (aux)>=48 && (aux)<=57)/*Numeros = 1*/
											{
												nodo=10;
											}
											else
											{
												if(nodo==10 && (aux)>=48 && (aux)<=57)/*Numeros = 2*/
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
		
	}
	if(nodo==11)
	{
		z.style.background='url(../../imagenes/ok.png)no-repeat';//cadena tecleeada correcta
		band=0;
	}
	else
	{
		z.style.background='url(../../imagenes/error.png)no-repeat';//cadena tecleeada correcta
		band=0;
	}
return band;
}

/*Código Anterior*/
function codanterior(acod,z)
{
	nodo=0;
	var nodo=1;
	for(a in acod)
	{
		aux=acod.charCodeAt(a);
		if(nodo==1 && (aux)>=65 && (aux)<=90)/*Letras*/
		{
			nodo=2;
		}
		else
		{
			if(nodo==2 && (aux)>=65 && (aux)<=90)/*Varias Letras*/
			{
				nodo=2;
			}
			else
			{
				if(nodo==2 && (aux)>=48 && (aux)<=57)/*Numeros = 1*/
				{
					nodo=3;
				}
				else
				{
					if(nodo==3 && (aux)>=48 && (aux)<=57)/*Numeros = 2*/
					{
						nodo=4;
					}
					else
					{
						if(nodo==4 && (aux)>=48 && (aux)<=57)/*Numeros = 3*/
						{
							nodo=5;
						}
						else
						{
							if(nodo==5 && (aux)>=48 && (aux)<=57)/*Numeros = 4*/
							{
								nodo=6;
							}
							else
							{
								if(nodo==6 && (aux)>=48 && (aux)<=57)/*Numeros = 5*/
								{
									nodo=7;
								}
								else
								{
									if(nodo==7 && (aux)==45)/*Guion*/
									{
										nodo=8;
									}
									else
									{
										if(nodo==8 && (aux)>=48 && (aux)<=57)/*Numeros = 1*/
										{
											nodo=9;
										}
										else
										{
											if(nodo==9 && (aux)>=48 && (aux)<=57)/*Numeros = 2*/
											{
												nodo=10;
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
	if(nodo==10)
	{
		z.style.background='url(../../imagenes/ok.png)no-repeat';//cadena tecleeada correcta
		band=0;
	}
	else
	{
		z.style.background='url(../../imagenes/error.png)no-repeat';//cadena tecleeada correcta
		band=0;
	}
return band;
}

/*-------------------------------------------- PLACAS---------------------------------------------------*/

function placasV(placa,z)
	{
		nodo=0;
		var nodo=1;
		for(p in placa)
		{
			aux=placa.charCodeAt(p);
						
			if(nodo==1 && ((aux)>=65 && (aux)<=90 || (aux)>=48 && (aux)<=57))/*1 Letras o 1 num (1)*/
			{
				nodo=2;
			} else
				{
					if(nodo==2 && ((aux)>=65 && (aux)<=90 || (aux)>=48 && (aux)<=57))/*1 Letras o 1 num (2)*/
					{
						nodo=3;
					} else
						{
							if(nodo==3 && ((aux)>=65 && (aux)<=90 || (aux)>=48 && (aux)<=57))/*1 Letras o 1 num (3)*/
							{
								nodo=4;
							} else
								{
									if(nodo==4 && (aux)==45) /* guión medio*/
									{
										nodo=5;
									} else
										{
											if(nodo==5 && ((aux)>=65 && (aux)<=90 || (aux)>=48 && (aux)<=57)) /* 1 letra o 1 num*/
											{
												nodo=6;
											} else
												{
													if(nodo==6 && ((aux)>=65 && (aux)<=90 || (aux)>=48 && (aux)<=57)) /* 1 letra o 1 num*/
													{
														nodo=7;
													} else
														{
															if(nodo==7 && ((aux)>=65 && (aux)<=90 || (aux)==45)) /* 1 letra o 1 guión medio*/
															{
																nodo=8; /* primer nodo terminal */
															} else
																{
																	if(nodo==8 && ((aux)>=48 && (aux)<=57)) /* 1 num (1)*/
																	{
																		nodo=9;
																	} else
																		{
																			if(nodo==9 && ((aux)>=48 && (aux)<=57)) /* 1 num (2)*/
																			{
																				nodo=10; /* segundo nodo terminal */
																			} else
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
		if((nodo==8)||(nodo==10))
		{
			z.style.background='url(../../imagenes/ok.png)no-repeat';//cadena tecleeada correcta
			band=0;
		}
		else
		{
			z.style.background='url(../../imagenes/error.png)no-repeat';//cadena tecleeada correcta
			band=0;
		}
		return band;
	}
	
/*====================================== AÑO =======================================*/

function year(ano,z)
{
	nodo=0;
	var nodo=1;
	for(y in ano)
	{
		aux=ano.charCodeAt(y);
	
		if (nodo==1 && ((aux)>=48 && (aux)<=57)) // digito 1 
		{
			nodo = 2;
		} else
			{
				if (nodo==2 && ((aux)>=48 && (aux)<=57)) // digito 2 
				{
					nodo = 3;
				} else
					{
						if (nodo==3 && ((aux)>=48 && (aux)<=57)) // digito 3 
						{
							nodo = 4;
						} else
							{
								if (nodo==4 && ((aux)>=48 && (aux)<=57)) // digito 4
								{
									nodo = 5;
								}
							}
					}
			}		
	}
	if (nodo==5)
	{
		z.style.background='url(../../imagenes/ok.png)no-repeat';//cadena tecleeada correcta
		band=0;
		
	} else
		{
			z.style.background='url(../../imagenes/error.png)no-repeat';//cadena tecleeada incorrecta
			band=0;
		}
		return band;
}
/*--------------------------------------------------------------------------------*/

/*-------------------------------------------------------------------------------------*/
	
	/*------------------------------------ VIN no de serie del vehículo--------------------------------------------*/

	function vin(serie,z)
	{
		nodo=0;
		var nodo=1;
		for(s in serie)
		{
			aux=serie.charCodeAt(s);
					
			if(nodo==1 && ((aux)>=48 && (aux)<=57 || (aux)>=65 && (aux)<=90)) /* 1 letra MAY o 1 numero d1*/
			{
				nodo = 2;
			} else
				{
					if(nodo==2 && ((aux)>=48 && (aux)<=57 || (aux)>=65 && (aux)<=90)) /* 1 letra MAY o 1 numero d2*/
					{
						nodo = 3;
					} else
						{
							if(nodo==3 && ((aux)>=48 && (aux)<=57 || (aux)>=65 && (aux)<=90)) /* 1 letra MAY o 1 numero d3*/
							{
								nodo = 4;
							} else
								{
									if(nodo==4 && ((aux)>=48 && (aux)<=57 || (aux)>=65 && (aux)<=90)) /* 1 letra MAY o 1 numero d4*/
									{
										nodo = 5;
									} else
										{
											if(nodo==5 && ((aux)>=48 && (aux)<=57 || (aux)>=65 && (aux)<=90)) /* 1 letra MAY o 1 numero d5*/
											{
												nodo = 6;
											} else
												{
													if(nodo==6 && ((aux)>=48 && (aux)<=57 || (aux)>=65 && (aux)<=90)) /* 1 letra MAY o 1 numero d6*/
													{
														nodo = 7;
													} else
														{
															if(nodo==7 && ((aux)>=48 && (aux)<=57 || (aux)>=65 && (aux)<=90)) /* 1 letra MAY o 1 numero d7*/
															{
																nodo = 8;
															} else
																{
																	if(nodo==8 && ((aux)>=48 && (aux)<=57 || (aux)>=65 && (aux)<=90)) /* 1 letra MAY o 1 numero d8*/
																	{
																		nodo = 9;
																	} else
																		{
																			if(nodo==9 && ((aux)>=48 && (aux)<=57 || (aux)>=65 && (aux)<=90)) /* 1 letra MAY o 1 numero d9*/
																			{
																				nodo = 10;
																			} else
																				{
																					if(nodo==10 && ((aux)>=48 && (aux)<=57 || (aux)>=65 && (aux)<=90)) /* 1 letra MAY o 1 numero d10*/
																					{
																						nodo = 11;
																					} else
																						{
																							if(nodo==11 && ((aux)>=48 && (aux)<=57 || (aux)>=65 && (aux)<=90)) /* 1 letra MAY o 1 numero d11*/
																							{
																								nodo = 12;
																							} else
																								{
																									if(nodo==12 && ((aux)>=48 && (aux)<=57 || (aux)>=65 && (aux)<=90)) /* 1 letra MAY o 1 numero d12*/
																									{
																										nodo = 13;
																									} else
																										{
																											if(nodo==13 && ((aux)>=48 && (aux)<=57 || (aux)>=65 && (aux)<=90)) /* 1 letra MAY o 1 numero d13*/
																											{
																												nodo = 14;
																											} else
																												{
																													if(nodo==14 && ((aux)>=48 && (aux)<=57 || (aux)>=65 && (aux)<=90)) /* 1 letra MAY o 1 numero d14*/
																													{
																														nodo = 15;
																													} else
																														{
																															if(nodo==15 && ((aux)>=48 && (aux)<=57 || (aux)>=65 && (aux)<=90)) /* 1 letra MAY o 1 numero d15*/
																															{
																																nodo = 16;
																															} else
																																{
																																	if(nodo==16 && ((aux)>=48 && (aux)<=57 || (aux)>=65 && (aux)<=90)) /* 1 letra MAY o 1 numero d16*/
																																	{
																																		nodo = 17;
																																	} else
																																		{
																																			if(nodo==17 && ((aux)>=48 && (aux)<=57 || (aux)>=65 && (aux)<=90)) /* 1 letra MAY o 1 numero d17*/
																																			{
																																				nodo = 18;
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
												}
										}
								}
						}
				}
		}
		if (nodo==18) 
		{
			z.style.background='url(../../imagenes/ok.png)no-repeat';//cadena tecleeada correcta
			band=0;
		} else
			{
				z.style.background='url(../../imagenes/error.png)no-repeat';//cadena tecleeada incorrecta
				band=0;
			}
			return band;
	} 
	
	/*-------------------------------------------COLOR Planta Vehículos y Bienes Informáticos ------------------------------------------*/
	function color(colors,z)
	{
		nodo=0;
		var nodo=1;
		for(c in colors)
		{
			aux=colors.charCodeAt(c);
		
			if(nodo==1 && ((aux)>=65 || (aux)==239 && (aux)<=90))/*Letras mayúsculas*/
			{
				nodo = 2;
			}
			else 
			{
				if(nodo==2 && ((aux)>=65 || (aux)==239 && (aux)<=90 || (aux)>=97 || (aux)==239 && (aux)<=122))/*Letras mayúsculas o minusculas 239 =´ */
				{ 
					nodo = 2; /* primer nodo terminal*/
				}
				else
				{
					if(nodo==2 && (aux)==32) /*espacio*/
					{
						nodo = 3;
					} 
					else 
					{
						if(nodo==3 && ((aux)>=65 || (aux)==239 && (aux)<=90))/*Letras mayúsculas*/
						{
							nodo = 4;
						}
						else
						{
							if(nodo==4 && ((aux)>=65 || (aux)==239 && (aux)<=90 || (aux)>=97 || (aux)==239 && (aux)<=122))/*Letras mayúsculas o minusculas 239 =´ */
							{
								nodo = 4; /* segundo nodo terminal*/
							}
							else
							{
								nodo = 0;
								break;
							}
						}
					}
				}
			}   
		}
		if((nodo==2)||(nodo==4))
		{
			z.style.background='url(../../imagenes/ok.png)no-repeat';//cadena tecleeada correcta
			band=0;
		}
		else
		{
			z.style.background='url(../../imagenes/error.png)no-repeat';//cadena tecleeada incorrecta
			band=0;
		}
		return band;
	}
	/*--------------------------------------------------------------------------------*/
	
	/*=============================================================Equipos Informáticos=====================================================*/

	/*Nombre Equipo Informático*/
	
	function autoTec(nombreTec,z)
	{
		nodo=0;
		var nodo=1;
		for(i in nombreTec)
		{
			aux=nombreTec.charCodeAt(i);
		
			if(nodo==1 && (aux)>=65 || (aux)==239 && (aux)<=90 || (aux)==165) /*Letras mayúsculas, acento, Ñ*/
			{
				nodo=2;
			}
			else /*239 = ´ , 165 = Ñ, 164 = ñ */
			{
				if(nodo==2 && ((aux)>=65 || (aux)==239 && (aux)<=90 || (aux)==165 || (aux)>=97 || (aux)==239 && (aux)<=122 || (aux)==164))/*Letras mayúsculas o minisculas, acento Ñ o ñ */
				{ 
					nodo=2; /* primer nodo terminal */
				}
				else
				{
					if(nodo==2 && (aux)==32)/*Espacio*/
					{
						nodo=3;
					}
					else
					{
						if(nodo==3 && ((aux)>=65 || (aux)==239 && (aux)<=90 || (aux)==165 || (aux)>=97 || (aux)==239 && (aux)<=122 || (aux)==164))/*Letras mayúsculas o minisculas, acento Ñ o ñ */
						{ 
							nodo=4;
						} 
						else
						{
							if(nodo==4 && ((aux)>=65 || (aux)==239 && (aux)<=90 || (aux)==165 || (aux)>=97 || (aux)==239 && (aux)<=122 || (aux)==164))/*Letras mayúsculas o minisculas, acento Ñ o ñ */
							{ 
								nodo=4; /* segundo nodo terminal */
							}
							else
							{
								nodo = 0;
								break;	
							} 
						} 
					}
				}
			}   
		}
		if((nodo==2)||(nodo==4))
		{
			z.style.background='url(../../imagenes/ok.png)no-repeat';//cadena tecleeada correcta
			band=0;
		}
		else
		{
			z.style.background='url(../../imagenes/error.png)no-repeat';//cadena tecleeada incorrecta
			band=0;
		}
		return band;
	}
	
	/*----------------------------------------------------------------------------------------------------------------------------*/
	
	/*====================================== MARCA Vehículos y Bienes Informáticos =======================================*/

	function automarca(marca,z)
	{
		nodo=0;
		var nodo=1;
		for(ma in marca)
		{
			aux=marca.charCodeAt(ma);
					
			if(nodo==1 && (aux)>=65 || (aux)==239 && (aux)<=90)/*Letras mayúsculas*/
			{
				nodo = 2;
			}
			else 
			{
				if(nodo==2 && ((aux)>=65 || (aux)==239 && (aux)<=90 || (aux)>=97 || (aux)==239 && (aux)<=122))/*Letras mayúsculas o minusculas*/
				{ 
					nodo = 2; /* primer nodo terminal*/
				}
				else
				{
					if(nodo==2 && (aux)==32)/*Espacio*/
					{
						nodo = 3;
					}
					else
					{
						if(nodo==3 && ((aux)>=65 || (aux)==239 && (aux)<=90))/*Letras mayúsculas o minusculas*/
						{
							nodo = 4;
						} 
						else
						{
							if(nodo==4 && ((aux)>=65 || (aux)==239 && (aux)<=90 || (aux)>=97 || (aux)==239 && (aux)<=122))/*Letras mayúsculas o minusculas*/
							{
								nodo = 4;
							}
							else
							{
								nodo = 0;
								break;
							}
						} 
					}
				}
			}   
		}
		if((nodo==2)||(nodo==4))
		{
			z.style.background='url(../../imagenes/ok.png)no-repeat';//cadena tecleeada correcta
			band=0;
		}
		else
		{
			z.style.background='url(../../imagenes/error.png)no-repeat';//cadena tecleeada incorrecta
			band=0;
		}
		return band;
	}
	/*--------------------------------------------------------------------------------*/
	
	/*-------------------------------------------TIPO DE VEHÍCULO------------------------------------------*/
	function autotipo(tipo_v,z)
	{
		nodo=0;
		var nodo=1;
		for(ti in tipo_v)
		{
			aux=tipo_v.charCodeAt(ti);
		
			if(nodo==1 && ((aux)>=65 || (aux)==239 && (aux)<=90))/*Letras mayúsculas*/
			{
				nodo = 2;
			}
			else  /*  239 = ´ */
			{
				if(nodo==2 && ((aux)>=65 || (aux)==239 && (aux)<=90 || (aux)>=97 || (aux)==239 && (aux)<=122))/*Letras mayúsculas o minusculas */
				{ 
					nodo = 2; /*nodo terminal*/
				}
				else
				{	
					
					nodo = 0;
					break;
				}
			}   
		}
		if(nodo==2)
		{
			z.style.background='url(../../imagenes/ok.png)no-repeat';//cadena tecleeada correcta
			band=0;
		}
		else
		{
			z.style.background='url(../../imagenes/error.png)no-repeat';//cadena tecleeada incorrecta
			band=0;
		}
		return band;
	}
	/*--------------------------------------------------------------------------------*/

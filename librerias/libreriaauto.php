<?php
	/*======================Responsables=======================*/
	/*Nombre responsable*/
	function autonombre($nombre)
	{
		$nom=$nombre;
		$nodo=1;
		$cuantos=strlen($nom);/*Longitud de la cadena*/
		for($y=0;$y<$cuantos;$y++)
		{
			$aux=substr($nom,$y);/*Cortar la cadena*/
			if($nodo==1 && (ord($aux)>=65  || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165)) /*Letras mayúsculas, acento, Ñ*/
			{
				$nodo=2;
			}
			else /* ´=239 Ñ =165 */
			{
				if($nodo==2 && (ord($aux)>=65 || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165 || ord($aux)>=97 || ord($aux)==239 && ord($aux)<=122 || ord($aux)==164))/*Letras mayúsculas o minisculas, acento Ñ o ñ */
				{ 
					$nodo=2; /* primer nodo terminal*/
				}
				else
				{
					if($nodo==2 && ord($aux)==32)/*Espacio*/
					{
						$nodo=3;
					}
					else
					{
						if($nodo==3 && (ord($aux)>=65  || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165)) /*Letras mayúsculas, acento, Ñ*/
						{
							$nodo=4;
						}
						else
						{
							if($nodo==4 && (ord($aux)>=65 || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165 || ord($aux)>=97 || ord($aux)==239 && ord($aux)<=122 || ord($aux)==164))/*Letras mayúsculas o minisculas, acento Ñ o ñ */
							{ 
								$nodo=4; /* segundo nodo terminal*/
							}
							else
							{
								if($nodo==4 && ord($aux)==32)/*Espacio*/
								{
									$nodo=5;
								}
								else
								{
									if($nodo==5 && (ord($aux)>=65  || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165)) /*Letras mayúsculas, acento, Ñ*/
									{
										$nodo=6; 
									}
									else
									{
										if($nodo==6 && (ord($aux)>=65 || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165 || ord($aux)>=97 || ord($aux)==239 && ord($aux)<=122 || ord($aux)==164))/*Letras mayúsculas o minisculas, acento Ñ o ñ */
										{ 
											$nodo=6; /* tercer nodo terminal*/
										}
										else
										{
											if($nodo==6 && ord($aux)==32)/*Espacio*/
											{
												$nodo=7;
											}
											else
											{
												if($nodo==7 && (ord($aux)>=65  || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165)) /*Letras mayúsculas, acento, Ñ*/
												{
													$nodo=8;
												}
												else
												{
													if($nodo==8 && (ord($aux)>=65 || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165 || ord($aux)>=97 || ord($aux)==239 && ord($aux)<=122 || ord($aux)==164))/*Letras mayúsculas o minisculas, acento Ñ o ñ */
													{ 
														$nodo=8; /* cuarto nodo terminal*/
													}
													else
													{
														if($nodo==8 && ord($aux)==32)/*Espacio*/
														{
															$nodo=9;
														}
														else
														{
															if($nodo==9 && (ord($aux)>=65  || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165)) /*Letras mayúsculas, acento, Ñ*/
															{
																$nodo=10;
															}
															else
															{
																if($nodo==10 && (ord($aux)>=65 || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165 || ord($aux)>=97 || ord($aux)==239 && ord($aux)<=122 || ord($aux)==164))/*Letras mayúsculas o minisculas, acento Ñ o ñ */
																{ 
																	$nodo=10; /* quinto nodo terminal*/
																}
																else
																{
																	if($nodo==10 && ord($aux)==32)/*Espacio*/
																	{
																		$nodo=11;
																	}
																	else
																	{
																		if($nodo==11 && (ord($aux)>=65  || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165)) /*Letras mayúsculas, acento, Ñ*/
																		{
																			$nodo=12;
																		}
																		else
																		{
																			if($nodo==12 && (ord($aux)>=65 || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165 || ord($aux)>=97 || ord($aux)==239 && ord($aux)<=122 || ord($aux)==164))/*Letras mayúsculas o minisculas, acento Ñ o ñ */
																			{ 
																				$nodo=12; /* sexto nodo terminal*/
																			}
																			else
																			{
																				if($nodo==12 && ord($aux)==32)/*Espacio*/
																				{
																					$nodo=13;
																				}
																				else
																				{
																					if($nodo==13 && (ord($aux)>=65  || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165)) /*Letras mayúsculas, acento, Ñ*/
																					{
																						$nodo=14;
																					}
																					else
																					{
																						if($nodo==14 && (ord($aux)>=65 || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165 || ord($aux)>=97 || ord($aux)==239 && ord($aux)<=122 || ord($aux)==164))/*Letras mayúsculas o minisculas, acento Ñ o ñ */
																						{ 
																							$nodo=14; /* septimo nodo terminal*/
																						}
																						else
																						{
																							$nodo=0;
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
		if(($nodo==2)||($nodo==4)||($nodo==6)||($nodo==8)||($nodo==10)||($nodo==12)||($nodo==14))
		{
			return 0;
		}
		else
		{
			return 1;
		}
	}
	
	/*Apellido Paterno responsable*/
	function autoap($ap)
	{
		$ap_Pat=$ap;
		$nodo=1;
		$cuantos=strlen($ap_Pat);/*Longitud de la cadena*/
		for($y=0;$y<$cuantos;$y++)
		{
			$aux=substr($ap_Pat,$y);/*Cortar la cadena*/
			if($nodo==1 && (ord($aux)>=65  || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165)) /*Letras mayúsculas, acento, Ñ*/
			{
				$nodo=2;
			}
			else /* ´=239 Ñ =165 */
			{
				if($nodo==2 && (ord($aux)>=65 || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165 || ord($aux)>=97 || ord($aux)==239 && ord($aux)<=122 || ord($aux)==164))/*Letras mayúsculas o minisculas, acento Ñ o ñ */
				{ 
					$nodo=2; /* primer nodo terminal*/
				}
				else
				{
					if($nodo==2 && ord($aux)==32)/*Espacio*/
					{
						$nodo=3;
					}
					else
					{
						if($nodo==3 && (ord($aux)>=65  || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165)) /*Letras mayúsculas, acento, Ñ*/
						{
							$nodo=4;
						}
						else
						{
							if($nodo==4 && (ord($aux)>=65 || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165 || ord($aux)>=97 || ord($aux)==239 && ord($aux)<=122 || ord($aux)==164))/*Letras mayúsculas o minisculas, acento Ñ o ñ */
							{ 
								$nodo=4; /* segundo nodo terminal*/
							}
							else
							{
								if($nodo==4 && ord($aux)==32)/*Espacio*/
								{
									$nodo=5;
								}
								else
								{
									if($nodo==5 && (ord($aux)>=65  || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165)) /*Letras mayúsculas, acento, Ñ*/
									{
										$nodo=6; 
									}
									else
									{
										if($nodo==6 && (ord($aux)>=65 || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165 || ord($aux)>=97 || ord($aux)==239 && ord($aux)<=122 || ord($aux)==164))/*Letras mayúsculas o minisculas, acento Ñ o ñ */
										{ 
											$nodo=6; /* tercer nodo terminal*/
										}
										else
										{
											if($nodo==6 && ord($aux)==32)/*Espacio*/
											{
												$nodo=7;
											}
											else
											{
												if($nodo==7 && (ord($aux)>=65  || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165)) /*Letras mayúsculas, acento, Ñ*/
												{
													$nodo=8;
												}
												else
												{
													if($nodo==8 && (ord($aux)>=65 || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165 || ord($aux)>=97 || ord($aux)==239 && ord($aux)<=122 || ord($aux)==164))/*Letras mayúsculas o minisculas, acento Ñ o ñ */
													{ 
														$nodo=8; /* cuarto nodo terminal*/
													}
													else
													{
														if($nodo==8 && ord($aux)==32)/*Espacio*/
														{
															$nodo=9;
														}
														else
														{
															if($nodo==9 && (ord($aux)>=65  || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165)) /*Letras mayúsculas, acento, Ñ*/
															{
																$nodo=10;
															}
															else
															{
																if($nodo==10 && (ord($aux)>=65 || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165 || ord($aux)>=97 || ord($aux)==239 && ord($aux)<=122 || ord($aux)==164))/*Letras mayúsculas o minisculas, acento Ñ o ñ */
																{ 
																	$nodo=10; /* quinto nodo terminal*/
																}
																else
																{
																	if($nodo==10 && ord($aux)==32)/*Espacio*/
																	{
																		$nodo=11;
																	}
																	else
																	{
																		if($nodo==11 && (ord($aux)>=65  || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165)) /*Letras mayúsculas, acento, Ñ*/
																		{
																			$nodo=12;
																		}
																		else
																		{
																			if($nodo==12 && (ord($aux)>=65 || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165 || ord($aux)>=97 || ord($aux)==239 && ord($aux)<=122 || ord($aux)==164))/*Letras mayúsculas o minisculas, acento Ñ o ñ */
																			{ 
																				$nodo=12; /* sexto nodo terminal*/
																			}
																			else
																			{
																				if($nodo==12 && ord($aux)==32)/*Espacio*/
																				{
																					$nodo=13;
																				}
																				else
																				{
																					if($nodo==13 && (ord($aux)>=65  || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165)) /*Letras mayúsculas, acento, Ñ*/
																					{
																						$nodo=14;
																					}
																					else
																					{
																						if($nodo==14 && (ord($aux)>=65 || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165 || ord($aux)>=97 || ord($aux)==239 && ord($aux)<=122 || ord($aux)==164))/*Letras mayúsculas o minisculas, acento Ñ o ñ */
																						{ 
																							$nodo=14; /* septimo nodo terminal*/
																						}
																						else
																						{
																							$nodo=0;
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
		if(($nodo==2)||($nodo==4)||($nodo==6)||($nodo==8)||($nodo==10)||($nodo==12)||($nodo==14))
		{
			return 0;
		}
		else
		{
			return 1;
		}
	}
	
	/*Apellido Materno responsable*/
	function autoam($am)
	{
		$ap_Mat=$am;
		$nodo=1;
		$cuantos=strlen($ap_Mat);/*Longitud de la cadena*/
		for($y=0;$y<$cuantos;$y++)
		{
			$aux=substr($ap_Mat,$y);/*Cortar la cadena*/
			if($nodo==1 && (ord($aux)>=65  || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165)) /*Letras mayúsculas, acento, Ñ*/
			{
				$nodo=2;
			}
			else /* ´=239 Ñ =165 */
			{
				if($nodo==2 && (ord($aux)>=65 || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165 || ord($aux)>=97 || ord($aux)==239 && ord($aux)<=122 || ord($aux)==164))/*Letras mayúsculas o minisculas, acento Ñ o ñ */
				{ 
					$nodo=2; /* primer nodo terminal*/
				}
				else
				{
					if($nodo==2 && ord($aux)==32)/*Espacio*/
					{
						$nodo=3;
					}
					else
					{
						if($nodo==3 && (ord($aux)>=65  || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165)) /*Letras mayúsculas, acento, Ñ*/
						{
							$nodo=4;
						}
						else
						{
							if($nodo==4 && (ord($aux)>=65 || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165 || ord($aux)>=97 || ord($aux)==239 && ord($aux)<=122 || ord($aux)==164))/*Letras mayúsculas o minisculas, acento Ñ o ñ */
							{ 
								$nodo=4; /* segundo nodo terminal*/
							}
							else
							{
								if($nodo==4 && ord($aux)==32)/*Espacio*/
								{
									$nodo=5;
								}
								else
								{
									if($nodo==5 && (ord($aux)>=65  || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165)) /*Letras mayúsculas, acento, Ñ*/
									{
										$nodo=6; 
									}
									else
									{
										if($nodo==6 && (ord($aux)>=65 || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165 || ord($aux)>=97 || ord($aux)==239 && ord($aux)<=122 || ord($aux)==164))/*Letras mayúsculas o minisculas, acento Ñ o ñ */
										{ 
											$nodo=6; /* tercer nodo terminal*/
										}
										else
										{
											if($nodo==6 && ord($aux)==32)/*Espacio*/
											{
												$nodo=7;
											}
											else
											{
												if($nodo==7 && (ord($aux)>=65  || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165)) /*Letras mayúsculas, acento, Ñ*/
												{
													$nodo=8;
												}
												else
												{
													if($nodo==8 && (ord($aux)>=65 || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165 || ord($aux)>=97 || ord($aux)==239 && ord($aux)<=122 || ord($aux)==164))/*Letras mayúsculas o minisculas, acento Ñ o ñ */
													{ 
														$nodo=8; /* cuarto nodo terminal*/
													}
													else
													{
														if($nodo==8 && ord($aux)==32)/*Espacio*/
														{
															$nodo=9;
														}
														else
														{
															if($nodo==9 && (ord($aux)>=65  || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165)) /*Letras mayúsculas, acento, Ñ*/
															{
																$nodo=10;
															}
															else
															{
																if($nodo==10 && (ord($aux)>=65 || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165 || ord($aux)>=97 || ord($aux)==239 && ord($aux)<=122 || ord($aux)==164))/*Letras mayúsculas o minisculas, acento Ñ o ñ */
																{ 
																	$nodo=10; /* quinto nodo terminal*/
																}
																else
																{
																	if($nodo==10 && ord($aux)==32)/*Espacio*/
																	{
																		$nodo=11;
																	}
																	else
																	{
																		if($nodo==11 && (ord($aux)>=65  || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165)) /*Letras mayúsculas, acento, Ñ*/
																		{
																			$nodo=12;
																		}
																		else
																		{
																			if($nodo==12 && (ord($aux)>=65 || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165 || ord($aux)>=97 || ord($aux)==239 && ord($aux)<=122 || ord($aux)==164))/*Letras mayúsculas o minisculas, acento Ñ o ñ */
																			{ 
																				$nodo=12; /* sexto nodo terminal*/
																			}
																			else
																			{
																				if($nodo==12 && ord($aux)==32)/*Espacio*/
																				{
																					$nodo=13;
																				}
																				else
																				{
																					if($nodo==13 && (ord($aux)>=65  || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165)) /*Letras mayúsculas, acento, Ñ*/
																					{
																						$nodo=14;
																					}
																					else
																					{
																						if($nodo==14 && (ord($aux)>=65 || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165 || ord($aux)>=97 || ord($aux)==239 && ord($aux)<=122 || ord($aux)==164))/*Letras mayúsculas o minisculas, acento Ñ o ñ */
																						{ 
																							$nodo=14; /* septimo nodo terminal*/
																						}
																						else
																						{
																							$nodo=0;
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
		if(($nodo==2)||($nodo==4)||($nodo==6)||($nodo==8)||($nodo==10)||($nodo==12)||($nodo==14))
		{
			return 0;
		}
		else
		{
			return 1;
		}
	}
	
	/*Teléfono*/
	function autotel($telefono)
	{
		$tel=$telefono;
		$nodo=1;
		$cuantos=strlen($tel);/*Longitud de la cadena*/
		for($y=0;$y<$cuantos;$y++)
		{
			$aux=substr($tel,$y);/*Cortar la cadena*/
			if($nodo==1 && (ord($aux)>=48 && ord($aux)<=57))/*Números*/
			{
				$nodo=2;
			}
			else
			{
				if($nodo==2 && (ord($aux)>=48 && ord($aux)<=57))/*Números*/
				{ 
					$nodo=3;
				}
				else
				{
					if($nodo==3 && (ord($aux)>=48 && ord($aux)<=57))/*Números*/
					{
						$nodo=4;
					}
					else
					{
						if($nodo==4 && (ord($aux)>=48 && ord($aux)<=57))/*Números*/
						{
							$nodo=5;
						}
						else
						{
							if($nodo==5 && (ord($aux)>=48 && ord($aux)<=57))/*Números*/
							{
								$nodo=6;
							}
							else
							{
								if($nodo==6 && (ord($aux)>=48 && ord($aux)<=57))/*Números*/
								{
									$nodo=7;
								}
								else
								{
									if($nodo==7 && (ord($aux)>=48 && ord($aux)<=57))/*Números*/
									{
										$nodo=8;
									}
									else
									{
										if($nodo==8 && (ord($aux)>=48 && ord($aux)<=57))/*Números*/
										{
											$nodo=9;
										}
										else
										{
											if($nodo==9 && (ord($aux)>=48 && ord($aux)<=57))/*Números*/
											{
												$nodo=10;
											}
											else
											{
												if($nodo==10 && (ord($aux)>=48 && ord($aux)<=57))/*Números*/
												{
													$nodo=11;
												}
												else
												{
													$nodo=0;
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
		if($nodo==11)
		{
			return 0;
		}
		else
		{
			return 1;
		}
	}
	
	/*Extensión*/
	function autoext($telIAPEM)
	{
		$ext=$telIAPEM;
		$nodo=1;
		$cuantos=strlen($ext);/*Longitud de la cadena*/
		for($y=0;$y<$cuantos;$y++)
		{
			$aux=substr($ext,$y);/*Cortar la cadena*/
			if($nodo==1 && (ord($aux)>=48 && ord($aux)<=57))/*Números*/
			{
				$nodo=2;
			}
			else
			{
				if($nodo==2 && (ord($aux)>=48 && ord($aux)<=57))/*Números*/
				{
					$nodo=3;
				}
				else
				{
					if($nodo==3 && (ord($aux)>=48 && ord($aux)<=57))/*Números*/
					{
						$nodo=4;
					}
					else
					{
						$nodo=0;
						break;
					}
				}
			}
		}
		if($nodo==4)
		{
			return 0;
		}
		else
		{
			return 1;
		}
	}
	
	/*=============Coordinación=================*/
	/*Nombre Coordinación*/
	function autocoo($nomCo)
	{
		$coordinacion=$nomCo;
		$nodo=1;
		$cuantos=strlen($coordinacion);/*Longitud de la cadena*/
		for($y=0;$y<$cuantos;$y++)
		{
			$aux=substr($coordinacion,$y);/*Cortar la cadena*/
			if($nodo==1 && (ord($aux)>=65  || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165)) /*Letras mayúsculas, acento, Ñ*/
			{
				$nodo=2;
			}
			else /* ´=239 Ñ =165 */
			{
				if($nodo==2 && (ord($aux)>=65 || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165 || ord($aux)>=97 || ord($aux)==239 && ord($aux)<=122 || ord($aux)==164))/*Letras mayúsculas o minisculas, acento Ñ o ñ */
				{ 
					$nodo=2; /* primer nodo terminal*/
				}
				else
				{
					if($nodo==2 && ord($aux)==32)/*Espacio*/
					{
						$nodo=3;
					}
					else
					{
						if($nodo==3 && (ord($aux)>=65  || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165)) /*Letras mayúsculas, acento, Ñ*/
						{
							$nodo=4;
						}
						else
						{
							if($nodo==4 && (ord($aux)>=65 || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165 || ord($aux)>=97 || ord($aux)==239 && ord($aux)<=122 || ord($aux)==164))/*Letras mayúsculas o minisculas, acento Ñ o ñ */
							{ 
								$nodo=4; /* segundo nodo terminal*/
							}
							else
							{
								if($nodo==4 && ord($aux)==32)/*Espacio*/
								{
									$nodo=5;
								}
								else
								{
									if($nodo==5 && (ord($aux)>=65  || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165)) /*Letras mayúsculas, acento, Ñ*/
									{
										$nodo=6; 
									}
									else
									{
										if($nodo==6 && (ord($aux)>=65 || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165 || ord($aux)>=97 || ord($aux)==239 && ord($aux)<=122 || ord($aux)==164))/*Letras mayúsculas o minisculas, acento Ñ o ñ */
										{ 
											$nodo=6; /* tercer nodo terminal*/
										}
										else
										{
											if($nodo==6 && ord($aux)==32)/*Espacio*/
											{
												$nodo=7;
											}
											else
											{
												if($nodo==7 && (ord($aux)>=65  || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165)) /*Letras mayúsculas, acento, Ñ*/
												{
													$nodo=8;
												}
												else
												{
													if($nodo==8 && (ord($aux)>=65 || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165 || ord($aux)>=97 || ord($aux)==239 && ord($aux)<=122 || ord($aux)==164))/*Letras mayúsculas o minisculas, acento Ñ o ñ */
													{ 
														$nodo=8; /* cuarto nodo terminal*/
													}
													else
													{
														if($nodo==8 && ord($aux)==32)/*Espacio*/
														{
															$nodo=9;
														}
														else
														{
															if($nodo==9 && (ord($aux)>=65  || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165)) /*Letras mayúsculas, acento, Ñ*/
															{
																$nodo=10;
															}
															else
															{
																if($nodo==10 && (ord($aux)>=65 || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165 || ord($aux)>=97 || ord($aux)==239 && ord($aux)<=122 || ord($aux)==164))/*Letras mayúsculas o minisculas, acento Ñ o ñ */
																{ 
																	$nodo=10; /* quinto nodo terminal*/
																}
																else
																{
																	if($nodo==10 && ord($aux)==32)/*Espacio*/
																	{
																		$nodo=11;
																	}
																	else
																	{
																		if($nodo==11 && (ord($aux)>=65  || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165)) /*Letras mayúsculas, acento, Ñ*/
																		{
																			$nodo=12;
																		}
																		else
																		{
																			if($nodo==12 && (ord($aux)>=65 || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165 || ord($aux)>=97 || ord($aux)==239 && ord($aux)<=122 || ord($aux)==164))/*Letras mayúsculas o minisculas, acento Ñ o ñ */
																			{ 
																				$nodo=12; /* sexto nodo terminal*/
																			}
																			else
																			{
																				if($nodo==12 && ord($aux)==32)/*Espacio*/
																				{
																					$nodo=13;
																				}
																				else
																				{
																					if($nodo==13 && (ord($aux)>=65  || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165)) /*Letras mayúsculas, acento, Ñ*/
																					{
																						$nodo=14;
																					}
																					else
																					{
																						if($nodo==14 && (ord($aux)>=65 || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165 || ord($aux)>=97 || ord($aux)==239 && ord($aux)<=122 || ord($aux)==164))/*Letras mayúsculas o minisculas, acento Ñ o ñ */
																						{ 
																							$nodo=14; /* septimo nodo terminal*/
																						}
																						else
																						{
																							$nodo=0;
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
		if(($nodo==2)||($nodo==4)||($nodo==6)||($nodo==8)||($nodo==10)||($nodo==12)||($nodo==14))
		{
			return 0;
		}
		else
		{
			return 1;
		}
	}
	
	/*==============Bienes Muebles================*/
	/*Nombre Mueble*/
	function automueble($nomM)
	{
		$mueble=$nomM;
		$nodo=1;
		$cuantos=strlen($mueble);/*Longitud de la cadena*/
		for($y=0;$y<$cuantos;$y++)
		{
			$aux=substr($mueble,$y);/*Cortar la cadena*/
			if($nodo==1 && (ord($aux)>=65  || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165)) /*Letras mayúsculas, acento, Ñ*/
			{
				$nodo=2;
			}
			else /* ´=239 Ñ =165 */
			{
				if($nodo==2 && (ord($aux)>=65 || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165 || ord($aux)>=97 || ord($aux)==239 && ord($aux)<=122 || ord($aux)==164))/*Letras mayúsculas o minisculas, acento Ñ o ñ */
				{ 
					$nodo=2; /* primer nodo terminal*/
				}
				else
				{
					if($nodo==2 && ord($aux)==32)/*Espacio*/
					{
						$nodo=3;
					}
					else
					{
						if($nodo==3 && (ord($aux)>=65  || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165)) /*Letras mayúsculas, acento, Ñ*/
						{
							$nodo=4;
						}
						else
						{
							if($nodo==4 && (ord($aux)>=65 || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165 || ord($aux)>=97 || ord($aux)==239 && ord($aux)<=122 || ord($aux)==164))/*Letras mayúsculas o minisculas, acento Ñ o ñ */
							{ 
								$nodo=4; /* segundo nodo terminal*/
							}
							else
							{
								if($nodo==4 && ord($aux)==32)/*Espacio*/
								{
									$nodo=5;
								}
								else
								{
									if($nodo==5 && (ord($aux)>=65  || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165)) /*Letras mayúsculas, acento, Ñ*/
									{
										$nodo=6; 
									}
									else
									{
										if($nodo==6 && (ord($aux)>=65 || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165 || ord($aux)>=97 || ord($aux)==239 && ord($aux)<=122 || ord($aux)==164))/*Letras mayúsculas o minisculas, acento Ñ o ñ */
										{ 
											$nodo=6; /* tercer nodo terminal*/
										}
										else
										{
											$nodo=0;
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
		if(($nodo==2)||($nodo==4)||($nodo==6))
		{
			return 0;
		}
		else
		{
			return 1;
		}
	}

/*--------------------------------------------------------- ÁREA DE UBICACIÓN Bienes Informáticos y Bienes Muebles -----------------------------------------------------------*/
	function autoubicacion($areaUb)
	{
		$area=$areaUb;
		$nodo=1;
		$cuantos=strlen($area);/*Longitud de la cadena*/
		for($y=0;$y<$cuantos;$y++)
		{
			
			$aux=substr($area,$y);/*Cortar la cadena*/
			
			if($nodo==1 && (ord($aux)>=65  || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165)) /*Letras mayúsculas, acento, Ñ*/
			{
				$nodo=2;
			}
			else /* ´=239 Ñ =165 */
			{
				if($nodo==2 && (ord($aux)>=65 || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165 || ord($aux)>=97 || ord($aux)==239 && ord($aux)<=122 || ord($aux)==164))/*Letras mayúsculas o minisculas, acento Ñ o ñ */
				{ 
					$nodo=2; /* primer nodo terminal*/
				}
				else
				{
					if($nodo==2 && ord($aux)==32)/*Espacio*/
					{
						$nodo=3;
					}
					else
					{
						if($nodo==3 && (ord($aux)>=65  || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165)) /*Letras mayúsculas, acento, Ñ*/
						{
							$nodo=4;
						}
						else
						{
							if($nodo==4 && (ord($aux)>=65 || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165 || ord($aux)>=97 || ord($aux)==239 && ord($aux)<=122 || ord($aux)==164))/*Letras mayúsculas o minisculas, acento Ñ o ñ */
							{ 
								$nodo=4; /* segundo nodo terminal*/
							}
							else
							{
								if($nodo==4 && ord($aux)==32)/*Espacio*/
								{
									$nodo=5;
								}
								else
								{
									if($nodo==5 && (ord($aux)>=65  || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165)) /*Letras mayúsculas, acento, Ñ*/
									{
										$nodo=6; 
									}
									else
									{
										if($nodo==6 && (ord($aux)>=65 || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165 || ord($aux)>=97 || ord($aux)==239 && ord($aux)<=122 || ord($aux)==164))/*Letras mayúsculas o minisculas, acento Ñ o ñ */
										{ 
											$nodo=6; /* tercer nodo terminal*/
										}
										else
										{
											if($nodo==6 && ord($aux)==32)/*Espacio*/
											{
												$nodo=7;
											}
											else
											{
												if($nodo==7 && (ord($aux)>=65  || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165)) /*Letras mayúsculas, acento, Ñ*/
												{
													$nodo=8;
												}
												else
												{
													if($nodo==8 && (ord($aux)>=65 || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165 || ord($aux)>=97 || ord($aux)==239 && ord($aux)<=122 || ord($aux)==164))/*Letras mayúsculas o minisculas, acento Ñ o ñ */
													{ 
														$nodo=8; /* cuarto nodo terminal*/
													}
													else
													{
														if($nodo==8 && ord($aux)==32)/*Espacio*/
														{
															$nodo=9;
														}
														else
														{
															if($nodo==9 && (ord($aux)>=65  || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165)) /*Letras mayúsculas, acento, Ñ*/
															{
																$nodo=10;
															}
															else
															{
																if($nodo==10 && (ord($aux)>=65 || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165 || ord($aux)>=97 || ord($aux)==239 && ord($aux)<=122 || ord($aux)==164))/*Letras mayúsculas o minisculas, acento Ñ o ñ */
																{ 
																	$nodo=10; /* quinto nodo terminal*/
																}
																else
																{
																	if($nodo==10 && ord($aux)==32)/*Espacio*/
																	{
																		$nodo=11;
																	}
																	else
																	{
																		if($nodo==11 && (ord($aux)>=65  || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165)) /*Letras mayúsculas, acento, Ñ*/
																		{
																			$nodo=12;
																		}
																		else
																		{
																			if($nodo==12 && (ord($aux)>=65 || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165 || ord($aux)>=97 || ord($aux)==239 && ord($aux)<=122 || ord($aux)==164))/*Letras mayúsculas o minisculas, acento Ñ o ñ */
																			{ 
																				$nodo=12; /* sexto nodo terminal*/
																			}
																			else
																			{
																				if($nodo==12 && ord($aux)==32)/*Espacio*/
																				{
																					$nodo=13;
																				}
																				else
																				{
																					if($nodo==13 && (ord($aux)>=65  || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165)) /*Letras mayúsculas, acento, Ñ*/
																					{
																						$nodo=14;
																					}
																					else
																					{
																						if($nodo==14 && (ord($aux)>=65 || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165 || ord($aux)>=97 || ord($aux)==239 && ord($aux)<=122 || ord($aux)==164))/*Letras mayúsculas o minisculas, acento Ñ o ñ */
																						{ 
																							$nodo=14; /* septimo nodo terminal*/
																						}
																						else
																						{
																							$nodo=0;
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
		if(($nodo==2)||($nodo==4)||($nodo==6)||($nodo==8)||($nodo==10)||($nodo==12)||($nodo==14))
		{
			return 0;
		}
		else
		{
			return 1;
		}
	}
	/*---------------------------------------------------------------------------------------------------------------------------------------------------------------------*/	
	
	
	/*=====================Bienes Inmuebles=======================*/
	/*Nombre Sede*/
		function autonomInm($nomInm)
	{
		$nombre=$nomInm;
		$nodo=1;
		$cuantos=strlen($nombre);/*Longitud de la cadena*/
		for($y=0;$y<$cuantos;$y++)
		{
			$aux=substr($nombre,$y);/*Cortar la cadena*/
			if($nodo==1 && (ord($aux)>=65  || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165)) /*Letras mayúsculas, acento, Ñ*/
			{
				$nodo=2;
			}
			else /* ´=239 Ñ =165 */
			{
				if($nodo==2 && (ord($aux)>=65 || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165 || ord($aux)>=97 || ord($aux)==239 && ord($aux)<=122 || ord($aux)==164))/*Letras mayúsculas o minisculas, acento Ñ o ñ */
				{ 
					$nodo=2; /* primer nodo terminal*/
				}
				else
				{
					if($nodo==2 && ord($aux)==32)/*Espacio*/
					{
						$nodo=3;
					}
					else
					{
						if($nodo==3 && (ord($aux)>=65  || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165)) /*Letras mayúsculas, acento, Ñ*/
						{
							$nodo=4;
						}
						else
						{
							if($nodo==4 && (ord($aux)>=65 || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165 || ord($aux)>=97 || ord($aux)==239 && ord($aux)<=122 || ord($aux)==164))/*Letras mayúsculas o minisculas, acento Ñ o ñ */
							{ 
								$nodo=4; /* segundo nodo terminal*/
							}
							else
							{
								if($nodo==4 && ord($aux)==32)/*Espacio*/
								{
									$nodo=5;
								}
								else
								{
									if($nodo==5 && (ord($aux)>=65  || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165)) /*Letras mayúsculas, acento, Ñ*/
									{
										$nodo=6; 
									}
									else
									{
										if($nodo==6 && (ord($aux)>=65 || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165 || ord($aux)>=97 || ord($aux)==239 && ord($aux)<=122 || ord($aux)==164))/*Letras mayúsculas o minisculas, acento Ñ o ñ */
										{ 
											$nodo=6; /* tercer nodo terminal*/
										}
										else
										{
											if($nodo==6 && ord($aux)==32)/*Espacio*/
											{
												$nodo=7;
											}
											else
											{
												if($nodo==7 && (ord($aux)>=65  || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165)) /*Letras mayúsculas, acento, Ñ*/
												{
													$nodo=8;
												}
												else
												{
													if($nodo==8 && (ord($aux)>=65 || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165 || ord($aux)>=97 || ord($aux)==239 && ord($aux)<=122 || ord($aux)==164))/*Letras mayúsculas o minisculas, acento Ñ o ñ */
													{ 
														$nodo=8; /* cuarto nodo terminal*/
													}
													else
													{
														if($nodo==8 && ord($aux)==32)/*Espacio*/
														{
															$nodo=9;
														}
														else
														{
															if($nodo==9 && (ord($aux)>=65  || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165)) /*Letras mayúsculas, acento, Ñ*/
															{
																$nodo=10;
															}
															else
															{
																if($nodo==10 && (ord($aux)>=65 || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165 || ord($aux)>=97 || ord($aux)==239 && ord($aux)<=122 || ord($aux)==164))/*Letras mayúsculas o minisculas, acento Ñ o ñ */
																{ 
																	$nodo=10; /* quinto nodo terminal*/
																}
																else
																{
																	if($nodo==10 && ord($aux)==32)/*Espacio*/
																	{
																		$nodo=11;
																	}
																	else
																	{
																		if($nodo==11 && (ord($aux)>=65  || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165)) /*Letras mayúsculas, acento, Ñ*/
																		{
																			$nodo=12;
																		}
																		else
																		{
																			if($nodo==12 && (ord($aux)>=65 || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165 || ord($aux)>=97 || ord($aux)==239 && ord($aux)<=122 || ord($aux)==164))/*Letras mayúsculas o minisculas, acento Ñ o ñ */
																			{ 
																				$nodo=12; /* sexto nodo terminal*/
																			}
																			else
																			{
																				if($nodo==12 && ord($aux)==32)/*Espacio*/
																				{
																					$nodo=13;
																				}
																				else
																				{
																					if($nodo==13 && (ord($aux)>=65  || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165)) /*Letras mayúsculas, acento, Ñ*/
																					{
																						$nodo=14;
																					}
																					else
																					{
																						if($nodo==14 && (ord($aux)>=65 || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165 || ord($aux)>=97 || ord($aux)==239 && ord($aux)<=122 || ord($aux)==164))/*Letras mayúsculas o minisculas, acento Ñ o ñ */
																						{ 
																							$nodo=14; /* septimo nodo terminal*/
																						}
																						else
																						{
																							$nodo=0;
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
		if(($nodo==2)||($nodo==4)||($nodo==6)||($nodo==8)||($nodo==10)||($nodo==12)||($nodo==14))
		{
			return 0;
		}
		else
		{
			return 1;
		}
	}
	
	/*Calle*/
	function autocalle($calle)
	{
		$ca=$calle;
		$nodo=1;
		$cuantos=strlen($ca);/*Longitud de la cadena*/
		for($y=0;$y<$cuantos;$y++)
		{
			$aux=substr($ca,$y);/*Cortar la cadena*/
			if($nodo==1 && (ord($aux)>=65 && ord($aux)<=90 || ord($aux)>=48 && ord($aux)<=57))/*Letras mayúsculas 65-90 Letras minúsculas 48-57*/
			{
				$nodo=2;
			}
			else /* ´ =239 Ñ=165 */
			{
				if($nodo==2 && (ord($aux)>=65 || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165 || ord($aux)==32 || ord($aux)>=48 && ord($aux)<=57))/*Letras mayúsculas y minúsculas*/
				{
					$nodo=2;
				}
				else
				{
					$nodo=0;
					break;
				}
			}
		}
		if($nodo==2)
		{
			return 0;
		}
		else
		{
			return 1;
		}
	}
	
	/*Número dirección*/
	function autonum($numero)
	{
		$no=$numero;
		$nodo=1;
		$cuantos=strlen($no);/*Longitud de la cadena*/
		for($y=0;$y<$cuantos;$y++)
		{
			$aux=substr($no,$y);/*Cortar la cadena*/
			if($nodo==1 && (ord($aux)>=48 && ord($aux)<=57))/*Números*/
			{
				$nodo=2;
			}
			else
			{
				if($nodo==2 && (ord($aux)>=48 && ord($aux)<=57))/*Números*/
				{
					$nodo=2;
				}
				else
				{
					$nodo=0;
					break;
				}
			}
		}
		if($nodo==2)
		{
			return 0;
		}
		else
		{
			return 1;
		}
	}
	
	/*Colonia*/
	function autocolonia($colonia)
	{
		$co=$colonia;
		$nodo=1;
		$cuantos=strlen($co);/*Longitud de la cadena*/
		for($y=0;$y<$cuantos;$y++)
		{
			$aux=substr($co,$y);/*Cortar la cadena*/
			if($nodo==1 && (ord($aux)>=65 && ord($aux)<=90 || ord($aux)>=48 && ord($aux)<=57))/*Letras mayúsculas 65-90 Letras minúsculas 48-57*/
			{
				$nodo=2;
			}
			else /* ´ =239 Ñ=165 */
			{
				if($nodo==2 && (ord($aux)>=65 || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165 || ord($aux)>=48 && ord($aux)<=57))/*Letras mayúsculas y minúsculas*/
				{
					$nodo=2;
				}
				else
				{
					if($nodo==2 && ord($aux)==32)/*Espacio*/
					{
						$nodo=2;
					}
					else
					{
						$nodo=0;
						break;
					}
				}
			}
		}
		if($nodo==2)
		{
			return 0;
		}
		else
		{
			return 1;
		}
	}
	
	/*Código Postal*/
	function autocp($cp)
	{
		$cod=$cp;
		$nodo=1;
		$cuantos=strlen($cod);/*Longitud de la cadena*/
		for($y=0;$y<$cuantos;$y++)
		{
			$aux=substr($cod,$y);/*Cortar la cadena*/
			if($nodo==1 && (ord($aux)>=48 && ord($aux)<=57))/*Números*/
			{
				$nodo=2;
			}
			else
			{
				if($nodo==2 && (ord($aux)>=48 && ord($aux)<=57))/*Números*/
				{ 
					$nodo=3;
				}
				else
				{
					if($nodo==3 && (ord($aux)>=48 && ord($aux)<=57))/*Números*/
					{
						$nodo=4;
					}
					else
					{
						if($nodo==4 && (ord($aux)>=48 && ord($aux)<=57))/*Números*/
						{
							$nodo=5;
						}
						else
						{
							if($nodo==5 && (ord($aux)>=48 && ord($aux)<=57))/*Números*/
							{
								$nodo=6;
							}
							else
							{
								$nodo=0;
								break;
							}
						}
					}
				}
			}
		}
		if($nodo==6)
		{
			return 0;
		}
		else
		{
			return 1;
		}
	}

	/*Ciudad*/
	function autociudad($ciudad)
	{
		$cd=$ciudad;
		$nodo=1;
		$cuantos=strlen($cd);/*Longitud de la cadena*/
		for($y=0;$y<$cuantos;$y++)
		{
			$aux=substr($cd,$y);/*Cortar la cadena*/
			if($nodo==1 && (ord($aux)>=65  || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165)) /*Letras mayúsculas, acento, Ñ*/
			{
				$nodo=2;
			}
			else /* ´=239 Ñ =165 */
			{
				if($nodo==2 && (ord($aux)>=65 || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165 || ord($aux)>=97 || ord($aux)==239 && ord($aux)<=122 || ord($aux)==164))/*Letras mayúsculas o minisculas, acento Ñ o ñ */
				{ 
					$nodo=2; /* primer nodo terminal*/
				}
				else
				{
					if($nodo==2 && ord($aux)==32)/*Espacio*/
					{
						$nodo=3;
					}
					else
					{
						if($nodo==3 && (ord($aux)>=65  || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165)) /*Letras mayúsculas, acento, Ñ*/
						{
							$nodo=4;
						}
						else
						{
							if($nodo==4 && (ord($aux)>=65 || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165 || ord($aux)>=97 || ord($aux)==239 && ord($aux)<=122 || ord($aux)==164))/*Letras mayúsculas o minisculas, acento Ñ o ñ */
							{ 
								$nodo=4; /* segundo nodo terminal*/
							}
							else
							{
								if($nodo==4 && ord($aux)==32)/*Espacio*/
								{
									$nodo=5;
								}
								else
								{
									if($nodo==5 && (ord($aux)>=65  || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165)) /*Letras mayúsculas, acento, Ñ*/
									{
										$nodo=6; 
									}
									else
									{
										if($nodo==6 && (ord($aux)>=65 || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165 || ord($aux)>=97 || ord($aux)==239 && ord($aux)<=122 || ord($aux)==164))/*Letras mayúsculas o minisculas, acento Ñ o ñ */
										{ 
											$nodo=6; /* tercer nodo terminal*/
										}
										else
										{
											if($nodo==6 && ord($aux)==32)/*Espacio*/
											{
												$nodo=7;
											}
											else
											{
												if($nodo==7 && (ord($aux)>=65  || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165)) /*Letras mayúsculas, acento, Ñ*/
												{
													$nodo=8;
												}
												else
												{
													if($nodo==8 && (ord($aux)>=65 || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165 || ord($aux)>=97 || ord($aux)==239 && ord($aux)<=122 || ord($aux)==164))/*Letras mayúsculas o minisculas, acento Ñ o ñ */
													{ 
														$nodo=8; /* cuarto nodo terminal*/
													}
													else
													{
														if($nodo==8 && ord($aux)==32)/*Espacio*/
														{
															$nodo=9;
														}
														else
														{
															if($nodo==9 && (ord($aux)>=65  || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165)) /*Letras mayúsculas, acento, Ñ*/
															{
																$nodo=10;
															}
															else
															{
																if($nodo==10 && (ord($aux)>=65 || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165 || ord($aux)>=97 || ord($aux)==239 && ord($aux)<=122 || ord($aux)==164))/*Letras mayúsculas o minisculas, acento Ñ o ñ */
																{ 
																	$nodo=10; /* quinto nodo terminal*/
																}
																else
																{
																	$nodo=0;
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
		if(($nodo==2)||($nodo==4)||($nodo==6)||($nodo==8)||($nodo==10))
		{
			return 0;
		}
		else
		{
			return 1;
		}
	}
	
	/*PRESTAMO Y RENTA INMUEBLES*/
	function autocadena($cadena)
	{
		$cad=$cadena;
		$nodo=1;
		$cuantos=strlen($cad);/*Longitud de la cadena*/
		for($y=0;$y<$cuantos;$y++)
		{
			$aux=substr($cad,$y);/*Cortar la cadena*/
			if($nodo==1 && (ord($aux)>=65  || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165)) /*Letras mayúsculas, acento, Ñ*/
			{
				$nodo=2;
			}
			else /* ´=239 Ñ =165 */
			{
				if($nodo==2 && (ord($aux)>=65 || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165 || ord($aux)>=97 || ord($aux)==239 && ord($aux)<=122 || ord($aux)==164))/*Letras mayúsculas o minisculas, acento Ñ o ñ */
				{ 
					$nodo=2; /* primer nodo terminal*/
				}
				else
				{
					if($nodo==2 && ord($aux)==32)/*Espacio*/
					{
						$nodo=3;
					}
					else
					{
						if($nodo==3 && (ord($aux)>=65  || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165)) /*Letras mayúsculas, acento, Ñ*/
						{
							$nodo=4;
						}
						else
						{
							if($nodo==4 && (ord($aux)>=65 || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165 || ord($aux)>=97 || ord($aux)==239 && ord($aux)<=122 || ord($aux)==164))/*Letras mayúsculas o minisculas, acento Ñ o ñ */
							{ 
								$nodo=4; /* segundo nodo terminal*/
							}
							else
							{
								if($nodo==4 && ord($aux)==32)/*Espacio*/
								{
									$nodo=5;
								}
								else
								{
									if($nodo==5 && (ord($aux)>=65  || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165)) /*Letras mayúsculas, acento, Ñ*/
									{
										$nodo=6; 
									}
									else
									{
										if($nodo==6 && (ord($aux)>=65 || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165 || ord($aux)>=97 || ord($aux)==239 && ord($aux)<=122 || ord($aux)==164))/*Letras mayúsculas o minisculas, acento Ñ o ñ */
										{ 
											$nodo=6; /* tercer nodo terminal*/
										}
										else
										{
											if($nodo==6 && ord($aux)==32)/*Espacio*/
											{
												$nodo=7;
											}
											else
											{
												if($nodo==7 && (ord($aux)>=65  || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165)) /*Letras mayúsculas, acento, Ñ*/
												{
													$nodo=8;
												}
												else
												{
													if($nodo==8 && (ord($aux)>=65 || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165 || ord($aux)>=97 || ord($aux)==239 && ord($aux)<=122 || ord($aux)==164))/*Letras mayúsculas o minisculas, acento Ñ o ñ */
													{ 
														$nodo=8; /* cuarto nodo terminal*/
													}
													else
													{
														if($nodo==8 && ord($aux)==32)/*Espacio*/
														{
															$nodo=9;
														}
														else
														{
															if($nodo==9 && (ord($aux)>=65  || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165)) /*Letras mayúsculas, acento, Ñ*/
															{
																$nodo=10;
															}
															else
															{
																if($nodo==10 && (ord($aux)>=65 || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165 || ord($aux)>=97 || ord($aux)==239 && ord($aux)<=122 || ord($aux)==164))/*Letras mayúsculas o minisculas, acento Ñ o ñ */
																{ 
																	$nodo=10; /* quinto nodo terminal*/
																}
																else
																{
																	if($nodo==10 && ord($aux)==32)/*Espacio*/
																	{
																		$nodo=11;
																	}
																	else
																	{
																		if($nodo==11 && (ord($aux)>=65  || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165)) /*Letras mayúsculas, acento, Ñ*/
																		{
																			$nodo=12;
																		}
																		else
																		{
																			if($nodo==12 && (ord($aux)>=65 || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165 || ord($aux)>=97 || ord($aux)==239 && ord($aux)<=122 || ord($aux)==164))/*Letras mayúsculas o minisculas, acento Ñ o ñ */
																			{ 
																				$nodo=12; /* sexto nodo terminal*/
																			}
																			else
																			{
																				if($nodo==12 && ord($aux)==32)/*Espacio*/
																				{
																					$nodo=13;
																				}
																				else
																				{
																					if($nodo==13 && (ord($aux)>=65  || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165)) /*Letras mayúsculas, acento, Ñ*/
																					{
																						$nodo=14;
																					}
																					else
																					{
																						if($nodo==14 && (ord($aux)>=65 || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165 || ord($aux)>=97 || ord($aux)==239 && ord($aux)<=122 || ord($aux)==164))/*Letras mayúsculas o minisculas, acento Ñ o ñ */
																						{ 
																							$nodo=14; /* septimo nodo terminal*/
																						}
																						else
																						{
																							$nodo=0;
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
		if(($nodo==2)||($nodo==4)||($nodo==6)||($nodo==8)||($nodo==10)||($nodo==12)||($nodo==14))
		{
			return 0;
		}
		else
		{
			return 1;
		}
	}
	
	/*Costo Renta Inmuebles*/
	function autocost($costo)
	{
		$cost=$costo;
		$nodo=1;
		$cuantos=strlen($cost);
		for($y=0;$y<$cuantos;$y++)
		{
			$aux=substr($cost,$y);
			if($nodo==1 && (ord($aux)>=48 && ord($aux)<=57))
			{
				$nodo=2;
			}
			else
			{
				if($nodo==2 && (ord($aux)>=48 && ord($aux)<=57))
				{
					$nodo=2;
				}
				else
				{
					if($nodo==2 && ord($aux)==46)/* punto=46 */
					{
						$nodo=3;
					}
					else
					{
						if($nodo==3 && (ord($aux)>=48 && ord($aux)<=57))
						{
							$nodo=4;
						}
						else
						{
							if($nodo==4 && (ord($aux)>=48 && ord($aux)<=57))
							{
								$nodo=5;
							}
							else
							{
								$nodo=0;
								break;
							}
						}
					}
				}
			}
		}
		if($nodo==2||$nodo==5)
		{
			return 0;
		}
		else
		{
			return 1;
		}
	}
	
	/*Codigo Nuevo*/
	function codNuevo($nuevoCodigo)
	{
		$ncod=$nuevoCodigo;
		$nodo=1;
		$cuantos=strlen($ncod);/*Longitud de la cadena*/
		for($y=0;$y<$cuantos;$y++)
		{
			$aux=substr($ncod,$y);/*Cortar la cadena*/
			if($nodo==1 && (ord($aux)>=65 && ord($aux)<=90))/*Letras*/
			{
				$nodo=2;
			}
			else
			{
				if($nodo==2 && (ord($aux)>=65 && ord($aux)<=90))/*Varias Letras*/
				{
					$nodo=2;
				}
				else
				{
					if($nodo==2 && (ord($aux)>=48 && ord($aux)<=57))/*Numeros = 1*/
					{
						$nodo=3;
					}
					else
					{
						if($nodo==3 && (ord($aux)>=48 && ord($aux)<=57))/*Numeros = 2*/
						{
							$nodo=4;
						}
						else
						{
							if($nodo==4 && (ord($aux)>=48 && ord($aux)<=57))/*Numeros = 3*/
							{
								$nodo=5;
							}
							else
							{
								if($nodo==5 && (ord($aux)>=48 && ord($aux)<=57))/*Numeros = 4*/
								{
									$nodo=6;
								}
								else
								{
									if($nodo==6 && (ord($aux)>=48 && ord($aux)<=57))/*Numeros = 5*/
									{
										$nodo=7;
									}
									else
									{
										if($nodo==7 && (ord($aux)>=48 && ord($aux)<=57))/*Numeros = 6*/
										{
											$nodo=8;
										}
										else
										{
											if($nodo==8 && ord($aux)==45)/*Guion*/
											{
												$nodo=9;
											}
											else
											{
												if($nodo==9 && (ord($aux)>=48 && ord($aux)<=57))/*Numeros = 1*/
												{
													$nodo=10;
												}
												else
												{
													if($nodo==10 && (ord($aux)>=48 && ord($aux)<=57))/*Numeros = 2*/
													{
														$nodo=11;
													}
													else
													{
														$nodo=0;
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
		if($nodo==11)
		{
			return 0;
		}
		else
		{
			return 1;
		}
	}
	
	/*Codigo Anterior*/
	function codAnterior($anteriorCodigo)
	{
		$acod=$anteriorCodigo;
		$nodo=1;
		$cuantos=strlen($acod);/*Longitud de la cadena*/
		for($y=0;$y<$cuantos;$y++)
		{
			$aux=substr($acod,$y);/*Cortar la cadena*/
			if($nodo==1 && (ord($aux)>=65 && ord($aux)<=90))/*Letras*/
			{
				$nodo=2;
			}
			else
			{
				if($nodo==2 && (ord($aux)>=65 && ord($aux)<=90))/*Varias Letras*/
				{
					$nodo=2;
				}
				else
				{
					if($nodo==2 && (ord($aux)>=48 && ord($aux)<=57))/*Numeros = 1*/
					{
						$nodo=3;
					}
					else
					{
						if($nodo==3 && (ord($aux)>=48 && ord($aux)<=57))/*Numeros = 2*/
						{
							$nodo=4;
						}
						else
						{
							if($nodo==4 && (ord($aux)>=48 && ord($aux)<=57))/*Numeros = 3*/
							{
								$nodo=5;
							}
							else
							{
								if($nodo==5 && (ord($aux)>=48 && ord($aux)<=57))/*Numeros = 4*/
								{
									$nodo=6;
								}
								else
								{
									if($nodo==6 && (ord($aux)>=48 && ord($aux)<=57))/*Numeros = 5*/
									{
										$nodo=7;
									}
									else
									{
										if($nodo==7 && ord($aux)==45)/*Guion*/
										{
											$nodo=8;
										}
										else
										{
											if($nodo==8 && (ord($aux)>=48 && ord($aux)<=57))/*Numeros = 1*/
											{
												$nodo=9;
											}
											else
											{
												if($nodo==9 && (ord($aux)>=48 && ord($aux)<=57))/*Numeros = 2*/
												{
													$nodo=10;
												}
												else
												{
													$nodo=0;
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
		if($nodo==10)
		{
			return 0;
		}
		else
		{
			return 1;
		}
	}
	/*===================================================BIENES INFORMÁTICOS=================================================*/
	/*=============================================================Equipos Informáticos=====================================================*/

	/*Nombre Equipo Informático*/
	
	function autoTec($nombreTec)
	{
		$equipo = $nombreTec;
		$nodo = 1;
		$cuantos = strlen($equipo);/*Longitud de la cadena*/
		for($y=0;$y<$cuantos;$y++)
		{
			$aux = substr($equipo,$y);/*Cortar la cadena*/
			if($nodo==1 && ord($aux)>=65 || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165) /*Letras mayúsculas, acento, Ñ*/
			{
				$nodo=2;
			}
			else /*239 = ´ , 165 = Ñ, 164 = ñ */
			{
				if($nodo==2 && (ord($aux)>=65 || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165 || ord($aux)>=97 || ord($aux)==239 && ord($aux)<=122 || ord($aux)==164))/*Letras mayúsculas o minisculas, acento Ñ o ñ */
				{ 
					$nodo=2; /* primer nodo terminal */
				}
				else
				{
					if($nodo==2 && ord($aux)==32)/*Espacio*/
					{
						$nodo=3;
					}
					else
					{
						if($nodo==3 && (ord($aux)>=65 || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165 || ord($aux)>=97 || ord($aux)==239 && ord($aux)<=122 || ord($aux)==164))/*Letras mayúsculas o minisculas, acento Ñ o ñ */
						{ 
							$nodo=4;
						} 
						else
						{
							if($nodo==4 && (ord($aux)>=65 || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165 || ord($aux)>=97 || ord($aux)==239 && ord($aux)<=122 || ord($aux)==164))/*Letras mayúsculas o minisculas, acento Ñ o ñ */
							{ 
								$nodo=4; /* segundo nodo terminal */
							}
							else
							{
								$nodo = 0;
								break;	
							} 
						} 
					}
				}
			}   
		}
		if(($nodo==2)||($nodo==4))
		{
			return 0;
		}
		else
		{
			return 1;
		}
	}
	
	/*---------------------------------------------------PLANTA VEHICULAR-------------------------------------------------------------------------*/
	
	/*====================================== MARCA Vehículos y Bienes Informáticos =======================================*/

	function marca($marca)
	{
		$mark = $marca;
		$nodo = 1;
		$cuantos = strlen ($mark); /*Longitud de la cadena*/
		for ($y=0;$y<$cuantos;$y++)
		{
			$aux = substr ($mark,$y); /*Cortar la cadena*/
			
			if($nodo==1 && ord($aux)>=65 || ord($aux)==239 && ord($aux)<=90)/*Letras mayúsculas*/
			{
				$nodo = 2;
			}
			else 
			{
				if($nodo==2 && (ord($aux)>=65 || ord($aux)==239 && ord($aux)<=90 || ord($aux)>=97 || ord($aux)==239 && ord($aux)<=122))/*Letras mayúsculas o minusculas*/
				{ 
					$nodo = 2; /* primer nodo terminal*/
				}
				else
				{
					if($nodo==2 && ord($aux)==32)/*Espacio*/
					{
						$nodo = 3;
					}
					else
					{
						if($nodo==3 && (ord($aux)>=65 || ord($aux)==239 && ord($aux)<=90))/*Letras mayúsculas o minusculas*/
						{
							$nodo = 4;
						} 
						else
						{
							if($nodo==4 && (ord($aux)>=65 || ord($aux)==239 && ord($aux)<=90 || ord($aux)>=97 || ord($aux)==239 && ord($aux)<=122))/*Letras mayúsculas o minusculas*/
							{
								$nodo = 4;
							}
							else
							{
								$nodo = 0;
								break;
							}
						} 
					}
				}
			}   
		}
		if(($nodo==2)||($nodo==4))
		{
			return 0;
		}
		else
		{
			return 1;
		}
	}

	/*--------------------------------------------------------------------------------*/

	/*====================================== AÑO =======================================*/

	function year($ano)
	{
		$year = $ano;
		$nodo = 1;
		$cuantos = strlen ($year); /*Longitud de la cadena*/
		for ($y=0;$y<$cuantos;$y++)
		{
			$aux = substr ($year,$y); /*Cortar la cadena*/ 
			
			if ($nodo==1 && (ord($aux)>=48 && ord($aux)<=57)) // digito 1 
			{
				$nodo = 2;
			} else
				{
					if ($nodo==2 && (ord($aux)>=48 && ord($aux)<=57)) // digito 2 
					{
						$nodo = 3;
					} else
						{
							if ($nodo==3 && (ord($aux)>=48 && ord($aux)<=57)) // digito 3 
							{
								$nodo = 4;
							} else
								{
									if ($nodo==4 && (ord($aux)>=48 && ord($aux)<=57)) // digito 4
									{
										$nodo = 5;
									}
								}
						}
				}		
		}
		if ($nodo==5)
		{
			return 0;
		} else
			{
				return 1;
			}
	}
	/*--------------------------------------------------------------------------------*/

	/*-------------------------------------------------------- Codigo Nuevo Planta vehicular y Bienes Informáticos -------------------------------------------------------------*/
	function codigoNuevo($codigoNuevo)
	{
		$ncod=$codigoNuevo;
		$nodo=1;
		$cuantos=strlen($ncod);/*Longitud de la cadena*/
		for($y=0;$y<$cuantos;$y++)
		{
			$aux=substr($ncod,$y);/*Cortar la cadena*/
			if($nodo==1 && (ord($aux)>=65 && ord($aux)<=90))/*Letras*/
			{
				$nodo=2;
			}
			else
			{
				if($nodo==2 && (ord($aux)>=65 && ord($aux)<=90))/*Varias Letras*/
				{
					$nodo=2;
				}
				else
				{
					if($nodo==2 && (ord($aux)>=48 && ord($aux)<=57))/*Numeros = 1*/
					{
						$nodo=3;
					}
					else
					{
						if($nodo==3 && (ord($aux)>=48 && ord($aux)<=57))/*Numeros = 2*/
						{
							$nodo=4;
						}
						else
						{
							if($nodo==4 && (ord($aux)>=48 && ord($aux)<=57))/*Numeros = 3*/
							{
								$nodo=5;
							}
							else
							{
								if($nodo==5 && (ord($aux)>=48 && ord($aux)<=57))/*Numeros = 4*/
								{
									$nodo=6;
								}
								else
								{
									if($nodo==6 && (ord($aux)>=48 && ord($aux)<=57))/*Numeros = 5*/
									{
										$nodo=7;
									}
									else
									{
										if($nodo==7 && (ord($aux)>=48 && ord($aux)<=57))/*Numeros = 6*/
										{
											$nodo=8;
										}
										else
										{
											if($nodo==8 && ord($aux)==45)/*Guion*/
											{
												$nodo=9;
											}
											else
											{
												if($nodo==9 && (ord($aux)>=48 && ord($aux)<=57))/*Numeros = 1*/
												{
													$nodo=10;
												}
												else
												{
													if($nodo==10 && (ord($aux)>=48 && ord($aux)<=57))/*Numeros = 2*/
													{
														$nodo=11;
													}
													else
													{
														$nodo=0;
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
		if($nodo==11)
		{
			return 0;
		}
		else
		{
			return 1;
		}
	}
	/*-------------------------------------------------------------------------------------*/
	
	/*------------------------------------- Codigo Anterior Planta Vehicular y Bienes Infórmaticos--------------------------------*/
	function codigoAnterior($codigoAnterior)
	{
		$acod=$codigoAnterior;
		$nodo=1;
		$cuantos=strlen($acod);/*Longitud de la cadena*/
		for($y=0;$y<$cuantos;$y++)
		{
			$aux=substr($acod,$y);/*Cortar la cadena*/
			if($nodo==1 && (ord($aux)>=65 && ord($aux)<=90))/*Letras*/
			{
				$nodo=2;
			}
			else
			{
				if($nodo==2 && (ord($aux)>=65 && ord($aux)<=90))/*Varias Letras*/
				{
					$nodo=2;
				}
				else
				{
					if($nodo==2 && (ord($aux)>=48 && ord($aux)<=57))/*Numeros = 1*/
					{
						$nodo=3;
					}
					else
					{
						if($nodo==3 && (ord($aux)>=48 && ord($aux)<=57))/*Numeros = 2*/
						{
							$nodo=4;
						}
						else
						{
							if($nodo==4 && (ord($aux)>=48 && ord($aux)<=57))/*Numeros = 3*/
							{
								$nodo=5;
							}
							else
							{
								if($nodo==5 && (ord($aux)>=48 && ord($aux)<=57))/*Numeros = 4*/
								{
									$nodo=6;
								}
								else
								{
									if($nodo==6 && (ord($aux)>=48 && ord($aux)<=57))/*Numeros = 5*/
									{
										$nodo=7;
									}
									else
									{
										if($nodo==7 && ord($aux)==45)/*Guion*/
										{
											$nodo=8;
										}
										else
										{
											if($nodo==8 && (ord($aux)>=48 && ord($aux)<=57))/*Numeros = 1*/
											{
												$nodo=9;
											}
											else
											{
												if($nodo==9 && (ord($aux)>=48 && ord($aux)<=57))/*Numeros = 2*/
												{
													$nodo=10;
												}
												else
												{
													$nodo=0;
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
		if($nodo==10)
		{
			return 0;
		}
		else
		{
			return 1;
		}
	}
	/*-------------------------------------------------------------------------------------*/
	
	/*------------------------------------ PLACAS--------------------------------------------*/
	
	function placas($placas)
	{
		$pla=$placas;
		$nodo=1;
		$cuantos=strlen($pla);/*Longitud de la cadena*/
		for($y=0;$y<$cuantos;$y++)
		{
			$aux=substr($pla,$y);/*Cortar la cadena*/
			
			if($nodo==1 && (ord($aux)>=65 && ord($aux)<=90 || ord($aux)>=48 && ord($aux)<=57))/*1 Letras o 1 num (1)*/
			{
				$nodo=2;
			} else
				{
					if($nodo==2 && (ord($aux)>=65 && ord($aux)<=90 || ord($aux)>=48 && ord($aux)<=57))/*1 Letras o 1 num (2)*/
					{
						$nodo=3;
					} else
						{
							if($nodo==3 && (ord($aux)>=65 && ord($aux)<=90 || ord($aux)>=48 && ord($aux)<=57))/*1 Letras o 1 num (3)*/
							{
								$nodo=4;
							} else
								{
									if($nodo==4 && ord($aux)==45) /* guión medio*/
									{
										$nodo=5;
									} else
										{
											if($nodo==5 && (ord($aux)>=65 && ord($aux)<=90 || ord($aux)>=48 && ord($aux)<=57)) /* 1 letra o 1 num*/
											{
												$nodo=6;
											} else
												{
													if($nodo==6 && (ord($aux)>=65 && ord($aux)<=90 || ord($aux)>=48 && ord($aux)<=57)) /* 1 letra o 1 num*/
													{
														$nodo=7;
													} else
														{
															if($nodo==7 && (ord($aux)>=65 && ord($aux)<=90 || ord($aux)==45)) /* 1 letra o 1 guión medio*/
															{
																$nodo=8; /* primer nodo terminal */
															} else
																{
																	if($nodo==8 && (ord($aux)>=48 && ord($aux)<=57)) /* 1 num (1)*/
																	{
																		$nodo=9;
																	} else
																		{
																			if($nodo==9 && (ord($aux)>=48 && ord($aux)<=57)) /* 1 num (2)*/
																			{
																				$nodo=10; /* segundo nodo terminal */
																			} else
																				{
																					$nodo=0;
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
		if(($nodo==8)||($nodo==10))
		{
			return 0;
		}
		else
		{
			return 1;
		}

	}
	/*-------------------------------------------------------------------------------------*/
	
	/*------------------------------------ VIN no de serie del vehículo--------------------------------------------*/

	function vin($noSerie)
	{
		$serie = $noSerie;
		$nodo=1;
		$cuantos=strlen($serie);/*Longitud de la cadena*/
		for($y=0;$y<$cuantos;$y++)
		{
			$aux=substr($serie,$y);/*Cortar la cadena*/
			
			if($nodo==1 && (ord($aux)>=48 && ord($aux)<=57 || ord($aux)>=65 && ord($aux)<=90)) /* 1 letra MAY o 1 numero d1*/
			{
				$nodo = 2;
			} else
				{
					if($nodo==2 && (ord($aux)>=48 && ord($aux)<=57 || ord($aux)>=65 && ord($aux)<=90)) /* 1 letra MAY o 1 numero d2*/
					{
						$nodo = 3;
					} else
						{
							if($nodo==3 && (ord($aux)>=48 && ord($aux)<=57 || ord($aux)>=65 && ord($aux)<=90)) /* 1 letra MAY o 1 numero d3*/
							{
								$nodo = 4;
							} else
								{
									if($nodo==4 && (ord($aux)>=48 && ord($aux)<=57 || ord($aux)>=65 && ord($aux)<=90)) /* 1 letra MAY o 1 numero d4*/
									{
										$nodo = 5;
									} else
										{
											if($nodo==5 && (ord($aux)>=48 && ord($aux)<=57 || ord($aux)>=65 && ord($aux)<=90)) /* 1 letra MAY o 1 numero d5*/
											{
												$nodo = 6;
											} else
												{
													if($nodo==6 && (ord($aux)>=48 && ord($aux)<=57 || ord($aux)>=65 && ord($aux)<=90)) /* 1 letra MAY o 1 numero d6*/
													{
														$nodo = 7;
													} else
														{
															if($nodo==7 && (ord($aux)>=48 && ord($aux)<=57 || ord($aux)>=65 && ord($aux)<=90)) /* 1 letra MAY o 1 numero d7*/
															{
																$nodo = 8;
															} else
																{
																	if($nodo==8 && (ord($aux)>=48 && ord($aux)<=57 || ord($aux)>=65 && ord($aux)<=90)) /* 1 letra MAY o 1 numero d8*/
																	{
																		$nodo = 9;
																	} else
																		{
																			if($nodo==9 && (ord($aux)>=48 && ord($aux)<=57 || ord($aux)>=65 && ord($aux)<=90)) /* 1 letra MAY o 1 numero d9*/
																			{
																				$nodo = 10;
																			} else
																				{
																					if($nodo==10 && (ord($aux)>=48 && ord($aux)<=57 || ord($aux)>=65 && ord($aux)<=90)) /* 1 letra MAY o 1 numero d10*/
																					{
																						$nodo = 11;
																					} else
																						{
																							if($nodo==11 && (ord($aux)>=48 && ord($aux)<=57 || ord($aux)>=65 && ord($aux)<=90)) /* 1 letra MAY o 1 numero d11*/
																							{
																								$nodo = 12;
																							} else
																								{
																									if($nodo==12 && (ord($aux)>=48 && ord($aux)<=57 || ord($aux)>=65 && ord($aux)<=90)) /* 1 letra MAY o 1 numero d12*/
																									{
																										$nodo = 13;
																									} else
																										{
																											if($nodo==13 && (ord($aux)>=48 && ord($aux)<=57 || ord($aux)>=65 && ord($aux)<=90)) /* 1 letra MAY o 1 numero d13*/
																											{
																												$nodo = 14;
																											} else
																												{
																													if($nodo==14 && (ord($aux)>=48 && ord($aux)<=57 || ord($aux)>=65 && ord($aux)<=90)) /* 1 letra MAY o 1 numero d14*/
																													{
																														$nodo = 15;
																													} else
																														{
																															if($nodo==15 && (ord($aux)>=48 && ord($aux)<=57 || ord($aux)>=65 && ord($aux)<=90)) /* 1 letra MAY o 1 numero d15*/
																															{
																																$nodo = 16;
																															} else
																																{
																																	if($nodo==16 && (ord($aux)>=48 && ord($aux)<=57 || ord($aux)>=65 && ord($aux)<=90)) /* 1 letra MAY o 1 numero d16*/
																																	{
																																		$nodo = 17;
																																	} else
																																		{
																																			if($nodo==17 && (ord($aux)>=48 && ord($aux)<=57 || ord($aux)>=65 && ord($aux)<=90)) /* 1 letra MAY o 1 numero d17*/
																																			{
																																				$nodo = 18;
																																			} else
																																				{
																																					$nodo = 0;
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
		if ($nodo==18) 
		{
			return 0;
		} else
			{
				return 1;
			}
	} 
	/*-------------------------------------------COLOR Planta Vehículos y Bienes Informáticos ------------------------------------------*/
	function color($color)
	{
		$colors = $color;
		$nodo = 1;
		$cuantos = strlen ($colors); /*Longitud de la cadena*/
		for ($y=0;$y<$cuantos;$y++)
		{
			$aux = substr ($colors,$y); /*Cortar la cadena*/
			
			if($nodo==1 && (ord($aux)>=65 || ord($aux)==239 && ord($aux)<=90))/*Letras mayúsculas*/
			{
				$nodo = 2;
			}
			else 
			{
				if($nodo==2 && (ord($aux)>=65 || ord($aux)==239 && ord($aux)<=90 || ord($aux)>=97 || ord($aux)==239 && ord($aux)<=122))/*Letras mayúsculas o minusculas 239 =´ */
				{ 
					$nodo = 2; /* primer nodo terminal*/
				}
				else
				{
					if($nodo==2 && ord($aux)==32) /*espacio*/
					{
						$nodo = 3;
					} 
					else 
					{
						if($nodo==3 && (ord($aux)>=65 || ord($aux)==239 && ord($aux)<=90))/*Letras mayúsculas*/
						{
							$nodo = 4;
						}
						else
						{
							if($nodo==4 && (ord($aux)>=65 || ord($aux)==239 && ord($aux)<=90 || ord($aux)>=97 || ord($aux)==239 && ord($aux)<=122))/*Letras mayúsculas o minusculas 239 =´ */
							{
								$nodo = 4; /* segundo nodo terminal*/
							}
							else
							{
								$nodo = 0;
								break;
							}
						}
					}
				}
			}   
		}
		if(($nodo==2)||($nodo==4))
		{
			return 0;
		}
		else
		{
			return 1;
		}
	}
	/*--------------------------------------------------------------------------------*/
	
	/*-------------------------------------------TIPO DE VEHÍCULO------------------------------------------*/
	function tipoV($tipo_v)
	{
		$tipo = $tipo_v;
		$nodo = 1;
		$cuantos = strlen ($tipo); /*Longitud de la cadena*/
		for ($y=0;$y<$cuantos;$y++)
		{
			$aux = substr ($tipo,$y); /*Cortar la cadena*/
			
			if($nodo==1 && (ord($aux)>=65 || ord($aux)==239 && ord($aux)<=90))/*Letras mayúsculas*/
			{
				$nodo = 2;
			}
			else  /*  239 = ´ */
			{
				if($nodo==2 && (ord($aux)>=65 || ord($aux)==239 && ord($aux)<=90 || ord($aux)>=97 || ord($aux)==239 && ord($aux)<=122))/*Letras mayúsculas o minusculas */
				{ 
					$nodo = 2; /*nodo terminal*/
				}
				else
				{	
					
					$nodo = 0;
					break;
				}
			}   
		}
		if($nodo==2)
		{
			return 0;
		}
		else
		{
			return 1;
		}
	}
	/*--------------------------------------------------------------------------------*/
	
	/*-------------------------------------- COSTO SERVICIO ------------------------------------------*/
	
	function costo($costo)
	{
		$precio=$costo;
		$nodo=1;
		$cuantos=strlen($precio);
		for($y=0;$y<$cuantos;$y++)
		{
			$aux=substr($precio,$y);
			if($nodo==1 && (ord($aux)>=48 && ord($aux)<=57))
			{
				$nodo=2;
			}
			else
			{
				if($nodo==2 && (ord($aux)>=48 && ord($aux)<=57))
				{
					$nodo=2;
				}
				else
				{
					if($nodo==2 && ord($aux)==46)/* punto=46 */
					{
						$nodo=3;
					}
					else
					{
						if($nodo==3 && (ord($aux)>=48 && ord($aux)<=57))
						{
							$nodo=4;
						}
						else
						{
							if($nodo==4 && (ord($aux)>=48 && ord($aux)<=57))
							{
								$nodo=5;
							}
							else
							{
								$nodo=0;
								break;
							}
						}
					}
				}
			}
		}
		if($nodo==2||$nodo==5)
		{
			return 0;
		}
		else
		{
			return 1;
		}
	}
	/*--------------------------------------------------------------------------------*/
	
	/*====================================== USUARIOS =======================================*/
	
	/*--------------------------------------------------------- NOMBRE -----------------------------------------------------------*/
	function nombre($nombre)
	{
		$nom=$nombre;
		$nodo=1;
		$cuantos=strlen($nom);/*Longitud de la cadena*/
		for($y=0;$y<$cuantos;$y++)
		{
			
			$aux=substr($nom,$y);/*Cortar la cadena*/
			
			if($nodo==1 && (ord($aux)>=65  || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165)) /*Letras mayúsculas, acento, Ñ*/
			{
				$nodo=2;
			}
			else /* ´=239 Ñ =165 */
			{
				if($nodo==2 && (ord($aux)>=65 || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165 || ord($aux)>=97 || ord($aux)==239 && ord($aux)<=122 || ord($aux)==164))/*Letras mayúsculas o minisculas, acento Ñ o ñ */
				{ 
					$nodo=2; /* primer nodo terminal*/
				}
				else
				{
					if($nodo==2 && ord($aux)==32)/*Espacio*/
					{
						$nodo=3;
					}
					else
					{
						if($nodo==3 && (ord($aux)>=65  || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165)) /*Letras mayúsculas, acento, Ñ*/
						{
							$nodo=4;
						}
						else
						{
							if($nodo==4 && (ord($aux)>=65 || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165 || ord($aux)>=97 || ord($aux)==239 && ord($aux)<=122 || ord($aux)==164))/*Letras mayúsculas o minisculas, acento Ñ o ñ */
							{ 
								$nodo=4; /* segundo nodo terminal*/
							}
							else
							{
								if($nodo==4 && ord($aux)==32)/*Espacio*/
								{
									$nodo=5;
								}
								else
								{
									if($nodo==5 && (ord($aux)>=65  || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165)) /*Letras mayúsculas, acento, Ñ*/
									{
										$nodo=6; 
									}
									else
									{
										if($nodo==6 && (ord($aux)>=65 || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165 || ord($aux)>=97 || ord($aux)==239 && ord($aux)<=122 || ord($aux)==164))/*Letras mayúsculas o minisculas, acento Ñ o ñ */
										{ 
											$nodo=6; /* tercer nodo terminal*/
										}
										else
										{
											if($nodo==6 && ord($aux)==32)/*Espacio*/
											{
												$nodo=7;
											}
											else
											{
												if($nodo==7 && (ord($aux)>=65  || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165)) /*Letras mayúsculas, acento, Ñ*/
												{
													$nodo=8;
												}
												else
												{
													if($nodo==8 && (ord($aux)>=65 || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165 || ord($aux)>=97 || ord($aux)==239 && ord($aux)<=122 || ord($aux)==164))/*Letras mayúsculas o minisculas, acento Ñ o ñ */
													{ 
														$nodo=8; /* cuarto nodo terminal*/
													}
													else
													{
														if($nodo==8 && ord($aux)==32)/*Espacio*/
														{
															$nodo=9;
														}
														else
														{
															if($nodo==9 && (ord($aux)>=65  || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165)) /*Letras mayúsculas, acento, Ñ*/
															{
																$nodo=10;
															}
															else
															{
																if($nodo==10 && (ord($aux)>=65 || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165 || ord($aux)>=97 || ord($aux)==239 && ord($aux)<=122 || ord($aux)==164))/*Letras mayúsculas o minisculas, acento Ñ o ñ */
																{ 
																	$nodo=10; /* quinto nodo terminal*/
																}
																else
																{
																	if($nodo==10 && ord($aux)==32)/*Espacio*/
																	{
																		$nodo=11;
																	}
																	else
																	{
																		if($nodo==11 && (ord($aux)>=65  || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165)) /*Letras mayúsculas, acento, Ñ*/
																		{
																			$nodo=12;
																		}
																		else
																		{
																			if($nodo==12 && (ord($aux)>=65 || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165 || ord($aux)>=97 || ord($aux)==239 && ord($aux)<=122 || ord($aux)==164))/*Letras mayúsculas o minisculas, acento Ñ o ñ */
																			{ 
																				$nodo=12; /* sexto nodo terminal*/
																			}
																			else
																			{
																				if($nodo==12 && ord($aux)==32)/*Espacio*/
																				{
																					$nodo=13;
																				}
																				else
																				{
																					if($nodo==13 && (ord($aux)>=65  || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165)) /*Letras mayúsculas, acento, Ñ*/
																					{
																						$nodo=14;
																					}
																					else
																					{
																						if($nodo==14 && (ord($aux)>=65 || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165 || ord($aux)>=97 || ord($aux)==239 && ord($aux)<=122 || ord($aux)==164))/*Letras mayúsculas o minisculas, acento Ñ o ñ */
																						{ 
																							$nodo=14; /* septimo nodo terminal*/
																						}
																						else
																						{
																							$nodo=0;
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
		if(($nodo==2)||($nodo==4)||($nodo==6)||($nodo==8)||($nodo==10)||($nodo==12)||($nodo==14))
		{
			return 0;
		}
		else
		{
			return 1;
		}
	}
	/*---------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
	
	/*--------------------------------------------------------- APELLIDO PATERNO -----------------------------------------------------------*/
	function apPat($apPaterno)
	{
		$ap=$apPaterno;
		$nodo=1;
		$cuantos=strlen($ap);/*Longitud de la cadena*/
		for($y=0;$y<$cuantos;$y++)
		{
			
			$aux=substr($ap,$y);/*Cortar la cadena*/
			
			if($nodo==1 && (ord($aux)>=65  || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165)) /*Letras mayúsculas, acento, Ñ*/
			{
				$nodo=2;
			}
			else /* ´=239 Ñ =165 */
			{
				if($nodo==2 && (ord($aux)>=65 || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165 || ord($aux)>=97 || ord($aux)==239 && ord($aux)<=122 || ord($aux)==164))/*Letras mayúsculas o minisculas, acento Ñ o ñ */
				{ 
					$nodo=2; /* primer nodo terminal*/
				}
				else
				{
					if($nodo==2 && ord($aux)==32)/*Espacio*/
					{
						$nodo=3;
					}
					else
					{
						if($nodo==3 && (ord($aux)>=65  || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165)) /*Letras mayúsculas, acento, Ñ*/
						{
							$nodo=4;
						}
						else
						{
							if($nodo==4 && (ord($aux)>=65 || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165 || ord($aux)>=97 || ord($aux)==239 && ord($aux)<=122 || ord($aux)==164))/*Letras mayúsculas o minisculas, acento Ñ o ñ */
							{ 
								$nodo=4; /* segundo nodo terminal*/
							}
							else
							{
								if($nodo==4 && ord($aux)==32)/*Espacio*/
								{
									$nodo=5;
								}
								else
								{
									if($nodo==5 && (ord($aux)>=65  || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165)) /*Letras mayúsculas, acento, Ñ*/
									{
										$nodo=6; 
									}
									else
									{
										if($nodo==6 && (ord($aux)>=65 || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165 || ord($aux)>=97 || ord($aux)==239 && ord($aux)<=122 || ord($aux)==164))/*Letras mayúsculas o minisculas, acento Ñ o ñ */
										{ 
											$nodo=6; /* tercer nodo terminal*/
										}
										else
										{
											if($nodo==6 && ord($aux)==32)/*Espacio*/
											{
												$nodo=7;
											}
											else
											{
												if($nodo==7 && (ord($aux)>=65  || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165)) /*Letras mayúsculas, acento, Ñ*/
												{
													$nodo=8;
												}
												else
												{
													if($nodo==8 && (ord($aux)>=65 || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165 || ord($aux)>=97 || ord($aux)==239 && ord($aux)<=122 || ord($aux)==164))/*Letras mayúsculas o minisculas, acento Ñ o ñ */
													{ 
														$nodo=8; /* cuarto nodo terminal*/
													}
													else
													{
														if($nodo==8 && ord($aux)==32)/*Espacio*/
														{
															$nodo=9;
														}
														else
														{
															if($nodo==9 && (ord($aux)>=65  || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165)) /*Letras mayúsculas, acento, Ñ*/
															{
																$nodo=10;
															}
															else
															{
																if($nodo==10 && (ord($aux)>=65 || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165 || ord($aux)>=97 || ord($aux)==239 && ord($aux)<=122 || ord($aux)==164))/*Letras mayúsculas o minisculas, acento Ñ o ñ */
																{ 
																	$nodo=10; /* quinto nodo terminal*/
																}
																else
																{
																	if($nodo==10 && ord($aux)==32)/*Espacio*/
																	{
																		$nodo=11;
																	}
																	else
																	{
																		if($nodo==11 && (ord($aux)>=65  || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165)) /*Letras mayúsculas, acento, Ñ*/
																		{
																			$nodo=12;
																		}
																		else
																		{
																			if($nodo==12 && (ord($aux)>=65 || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165 || ord($aux)>=97 || ord($aux)==239 && ord($aux)<=122 || ord($aux)==164))/*Letras mayúsculas o minisculas, acento Ñ o ñ */
																			{ 
																				$nodo=12; /* sexto nodo terminal*/
																			}
																			else
																			{
																				if($nodo==12 && ord($aux)==32)/*Espacio*/
																				{
																					$nodo=13;
																				}
																				else
																				{
																					if($nodo==13 && (ord($aux)>=65  || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165)) /*Letras mayúsculas, acento, Ñ*/
																					{
																						$nodo=14;
																					}
																					else
																					{
																						if($nodo==14 && (ord($aux)>=65 || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165 || ord($aux)>=97 || ord($aux)==239 && ord($aux)<=122 || ord($aux)==164))/*Letras mayúsculas o minisculas, acento Ñ o ñ */
																						{ 
																							$nodo=14; /* septimo nodo terminal*/
																						}
																						else
																						{
																							$nodo=0;
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
		if(($nodo==2)||($nodo==4)||($nodo==6)||($nodo==8)||($nodo==10)||($nodo==12)||($nodo==14))
		{
			return 0;
		}
		else
		{
			return 1;
		}
	}
	/*---------------------------------------------------------------------------------------------------------------------------------------------------------------------*/

	/*--------------------------------------------------------- APELLIDO MATERNO -----------------------------------------------------------*/
	function apMat($apMaterno)
	{
		$am=$apMaterno;
		$nodo=1;
		$cuantos=strlen($am);/*Longitud de la cadena*/
		for($y=0;$y<$cuantos;$y++)
		{
			
			$aux=substr($am,$y);/*Cortar la cadena*/
			
			if($nodo==1 && (ord($aux)>=65  || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165)) /*Letras mayúsculas, acento, Ñ*/
			{
				$nodo=2;
			}
			else /* ´=239 Ñ =165 */
			{
				if($nodo==2 && (ord($aux)>=65 || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165 || ord($aux)>=97 || ord($aux)==239 && ord($aux)<=122 || ord($aux)==164))/*Letras mayúsculas o minisculas, acento Ñ o ñ */
				{ 
					$nodo=2; /* primer nodo terminal*/
				}
				else
				{
					if($nodo==2 && ord($aux)==32)/*Espacio*/
					{
						$nodo=3;
					}
					else
					{
						if($nodo==3 && (ord($aux)>=65  || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165)) /*Letras mayúsculas, acento, Ñ*/
						{
							$nodo=4;
						}
						else
						{
							if($nodo==4 && (ord($aux)>=65 || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165 || ord($aux)>=97 || ord($aux)==239 && ord($aux)<=122 || ord($aux)==164))/*Letras mayúsculas o minisculas, acento Ñ o ñ */
							{ 
								$nodo=4; /* segundo nodo terminal*/
							}
							else
							{
								if($nodo==4 && ord($aux)==32)/*Espacio*/
								{
									$nodo=5;
								}
								else
								{
									if($nodo==5 && (ord($aux)>=65  || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165)) /*Letras mayúsculas, acento, Ñ*/
									{
										$nodo=6; 
									}
									else
									{
										if($nodo==6 && (ord($aux)>=65 || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165 || ord($aux)>=97 || ord($aux)==239 && ord($aux)<=122 || ord($aux)==164))/*Letras mayúsculas o minisculas, acento Ñ o ñ */
										{ 
											$nodo=6; /* tercer nodo terminal*/
										}
										else
										{
											if($nodo==6 && ord($aux)==32)/*Espacio*/
											{
												$nodo=7;
											}
											else
											{
												if($nodo==7 && (ord($aux)>=65  || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165)) /*Letras mayúsculas, acento, Ñ*/
												{
													$nodo=8;
												}
												else
												{
													if($nodo==8 && (ord($aux)>=65 || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165 || ord($aux)>=97 || ord($aux)==239 && ord($aux)<=122 || ord($aux)==164))/*Letras mayúsculas o minisculas, acento Ñ o ñ */
													{ 
														$nodo=8; /* cuarto nodo terminal*/
													}
													else
													{
														if($nodo==8 && ord($aux)==32)/*Espacio*/
														{
															$nodo=9;
														}
														else
														{
															if($nodo==9 && (ord($aux)>=65  || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165)) /*Letras mayúsculas, acento, Ñ*/
															{
																$nodo=10;
															}
															else
															{
																if($nodo==10 && (ord($aux)>=65 || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165 || ord($aux)>=97 || ord($aux)==239 && ord($aux)<=122 || ord($aux)==164))/*Letras mayúsculas o minisculas, acento Ñ o ñ */
																{ 
																	$nodo=10; /* quinto nodo terminal*/
																}
																else
																{
																	if($nodo==10 && ord($aux)==32)/*Espacio*/
																	{
																		$nodo=11;
																	}
																	else
																	{
																		if($nodo==11 && (ord($aux)>=65  || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165)) /*Letras mayúsculas, acento, Ñ*/
																		{
																			$nodo=12;
																		}
																		else
																		{
																			if($nodo==12 && (ord($aux)>=65 || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165 || ord($aux)>=97 || ord($aux)==239 && ord($aux)<=122 || ord($aux)==164))/*Letras mayúsculas o minisculas, acento Ñ o ñ */
																			{ 
																				$nodo=12; /* sexto nodo terminal*/
																			}
																			else
																			{
																				if($nodo==12 && ord($aux)==32)/*Espacio*/
																				{
																					$nodo=13;
																				}
																				else
																				{
																					if($nodo==13 && (ord($aux)>=65  || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165)) /*Letras mayúsculas, acento, Ñ*/
																					{
																						$nodo=14;
																					}
																					else
																					{
																						if($nodo==14 && (ord($aux)>=65 || ord($aux)==239 && ord($aux)<=90 || ord($aux)==165 || ord($aux)>=97 || ord($aux)==239 && ord($aux)<=122 || ord($aux)==164))/*Letras mayúsculas o minisculas, acento Ñ o ñ */
																						{ 
																							$nodo=14; /* septimo nodo terminal*/
																						}
																						else
																						{
																							$nodo=0;
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
		if(($nodo==2)||($nodo==4)||($nodo==6)||($nodo==8)||($nodo==10)||($nodo==12)||($nodo==14))
		{
			return 0;
		}
		else
		{
			return 1;
		}
	}
	/*---------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
	
	/*-----------------------------------------------------CORREO---------------------------------------------------------*/

	function email($correo)
	{
		$mail = $correo;
		$nodo = 1;
		$cuantos = strlen ($mail); /*Longitud de la cadena*/
		for ($y=0;$y<$cuantos;$y++)
		{
			$aux = substr ($mail,$y); /*Cortar la cadena*/
		
			if ($nodo==1 && (ord($aux)>=97 && ord($aux)<=122 || ord($aux)>=65 && ord($aux)<=90)) /* letras minúsculas y mayúsculas*/
			{	
				$nodo = 2;	
			} else 
				{
					if ($nodo==2 && (ord($aux)>=97 && ord($aux)<=122 || ord($aux)>=65 && ord($aux)<=90 || ord($aux)>=48 && ord($aux)<=57 || ord($aux)==46 || ord($aux)==95 || ord($aux)==45)) /* letras minúsculas y mayúsculas, números, punto 46, guion bajo 95, guion medio 45*/
					{
						$nodo = 2;
					} else 
						{
							if ($nodo==2 && ord($aux)==64) /* 64 = @ */
							{
								$nodo = 3;
							} else 
								{
									if ($nodo==3 && (ord($aux)>=97 && ord($aux)<=122 || ord($aux)>=48 && ord($aux)<=57)) /* letras minúsculas y números */
									{
										$nodo = 4;
									} else
										{
											if ($nodo==4 && (ord($aux)>=97 && ord($aux)<=122 || ord($aux)>=48 && ord($aux)<=57 || ord($aux)==95 || ord($aux)==45)) /* letras minúsculas, números, guion bajo 95, guion medio 45*/
											{
												$nodo = 4;
											} else
												{
													if ($nodo==4 && ord($aux)==46) /*muestra codigo ASCCI de punto 46*/
													{
														$nodo = 5;
													} else
														{
															if ($nodo==5 && (ord($aux)>=97 && ord($aux)<=122)) /* letras minúsculas */
															{
																$nodo = 6;
															} else
																{
																	if ($nodo==6 && (ord($aux)>=97 && ord($aux)<=122)) /* letras minúsculas */
																	{
																		$nodo = 6; #pasa el nodo 6, primer nodo terminal
																	} else 
																		{
																			if ($nodo==6 && ord($aux)==46) # muestra codigo ASCCI de punto  
																			{
																				$nodo = 7;
																			} else
																				{
																					if ($nodo==7&& (ord($aux)>=97 && ord($aux)<=122)) /* letras minúsculas */
																					{
																						$nodo = 8;
																					} else
																						{
																							if ($nodo==8 && (ord($aux)>=97 && ord($aux)<=122)) /* letras minúsculas */
																							{
																								$nodo = 9; # pasa al nodo 9, nodo terminal
																							} else
																								{
																									$nodo = 0;
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

		if (($nodo==6)||($nodo==9)) # nodos terminales 
		{
			return 0;	
		} else
			{
				return 1;
			}
	}
	/* ------------------------------------------------------------------------------------------------------------------- */
?>
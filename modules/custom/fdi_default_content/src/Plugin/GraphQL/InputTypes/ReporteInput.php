<?php

/**
 * @file
 * Defines a mutation to create a node reporte.
 */

namespace Drupal\fdi_default_content\Plugin\GraphQL\InputTypes;

use Drupal\graphql\Plugin\GraphQL\InputTypes\InputTypePluginBase;

/**
 * The input type for Contacto mutations.
 *
 * @GraphQLInputType(
 *   id = "reporte_input",
 *   name = "ReporteInput",
 *   fields = {
 *     "title" = "String",
 *     "field_correo" = {
 *        "type" = "String",
 *        "nullable" = "TRUE"
 *     },
 *     "field_categoria_reporte" = {
 *        "type" = "[Int]",
 *        "nullable" = "TRUE"
 *     },
 *     "field_subcategoria_reporte" = {
 *        "type" = "[Int]",
 *        "nullable" = "TRUE"
 *     },
 *     "field_ubicacion" = {
 *        "type" = "[Float]",
 *        "nullable" = "TRUE"
 *     },
 *     "body" = {
 *        "type" = "String",
 *        "nullable" = "TRUE"
 *     },
 *     "field_codigo_de_seguimient" = {
 *        "type" = "String",
 *        "nullable" = "TRUE"
 *     },
 *     "field_lugar" = {
 *        "type" = "String",
 *        "nullable" = "TRUE"
 *     },
 *     "field_solicita_asesoria_o_apoyo" = {
 *        "type" = "String",
 *        "nullable" = "TRUE"
 *     }
 *   }
 * )
 */
class ReporteInput extends InputTypePluginBase {

}

<?php

/**
 * @file
 * Defines a mutation to create a node contacto.
 */

namespace Drupal\fdi_default_content\Plugin\GraphQL\InputTypes;

use Drupal\graphql\Plugin\GraphQL\InputTypes\InputTypePluginBase;

/**
 * The input type for Contacto mutations.
 *
 * @GraphQLInputType(
 *   id = "contacto_input",
 *   name = "ContactoInput",
 *   fields = {
 *     "title" = "String",
 *     "field_correo" = {
 *        "type" = "String",
 *        "nullable" = "TRUE"
 *     },
 *     "field_telefono" = {
 *        "type" = "String",
 *        "nullable" = "TRUE"
 *     },
 *     "body" = {
 *        "type" = "String",
 *        "nullable" = "TRUE"
 *     },
 *     "field_motivo_de_contacto" = {
 *        "type" = "String",
 *        "nullable" = "TRUE"
 *     },
 *     "field_otro_motivo" = {
 *        "type" = "String",
 *        "nullable" = "TRUE"
 *     },
 *     "field_nombre_del_sitio" = {
 *        "type" = "String",
 *        "nullable" = "TRUE"
 *     },
 *     "field_sitio_web" = {
 *        "type" = "String",
 *        "nullable" = "TRUE"
 *     },
 *     "field_codigo_de_seguimient" = {
 *        "type" = "String",
 *        "nullable" = "TRUE"
 *     }
 *   }
 * )
 */
class ContactoInput extends InputTypePluginBase {

}
